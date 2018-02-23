<div class="row">
<div id="accordion" role="tablist" aria-multiselectable="true" class="col-12 col-lg-3 col-xl-2 pr-0 pr-md-1">
  <?php
foreach ($categories as $datoC) {
  $id = $datoC['ID'];
  $name = $datoC['NAME'];
   ?>
    <div class="card bg-dark rounded-0">
      <div class="card-header text-center" role="tab" id="heading<?php echo $id; ?>">
        <h5 class="mb-0">
        <a class="text-success font-weight-bold"data-toggle="collapse" data-parsent="#accordion" href="#collapse<?php echo $id; ?>" aria-expanded="true" aria-controls="collapse<?php echo $id; ?>">
          <?php
          if ($datoC['NAME'] == $name) {
            echo $name;
          }?>
        </a>
      </h5>
      </div>

      <div id="collapse<?php echo $id; ?>" class="collapse bg-dark-submenu" role="tabpanel" aria-labelledby="heading<?php echo $id; ?>">
        <div class="card-block text-center">
          <?php foreach ($subCategories as $dato) {
  if ($dato['PARENTCATEGORY'] == $datoC['ID']) {?>
      <a class="text-success" href="index.php?controller=productos&action=show_subCatProduct&NAME=<?php echo $dato['SUBCATEGORIA'];?>"><?php  echo $dato['SUBCATEGORIA']."<br>"; ?></a>
          <?php
  }
}
?>
        </div>
      </div>
    </div>

    <?php } ?>
</div>
<div class="card-group col-12 col-lg-9">
