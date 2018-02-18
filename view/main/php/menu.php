
<div class="row">
<div id="accordion" role="tablist" aria-multiselectable="true" class="col-12 col-sm-5 col-md-4 col-lg-3 col-xl-2">
  <?php
foreach ($categories as $datoC) {
  $id = $datoC['ID'];
  $name = $datoC['NAME'];
   ?>
    <div class="card">
      <div class="card-header" role="tab" id="heading<?php echo $id; ?>">
        <h5 class="mb-0">
        <a data-toggle="collapse" data-parsent="#accordion" href="#collapse<?php echo $id; ?>" aria-expanded="true" aria-controls="collapse<?php echo $id; ?>">
          <?php
          if ($datoC['NAME'] == $name) {
            echo $name;
          }?>
        </a>
      </h5>
      </div>

      <div id="collapse<?php echo $id; ?>" class="collapse" role="tabpanel" aria-labelledby="heading<?php echo $id; ?>">
        <div class="card-block">
          <?php foreach ($subCategories as $dato) {
  if ($dato['PARENTCATEGORY'] == $datoC['ID']) {?>
      <a href="index.php?controller=productos&action=show_subCatProduct&NAME=<?php echo $dato['SUBCATEGORIA'];?>"><?php  echo $dato['SUBCATEGORIA']."<br>"; ?></a>
          <?php
  }
}
?>
        </div>
      </div>
    </div>

    <?php } ?>
</div>
      <div class="card-group col-8">
