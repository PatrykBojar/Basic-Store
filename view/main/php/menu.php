<div id="accordion" role="tablist" aria-multiselectable="true">
  <?php
foreach ($datosCtg as $datoC) {
  $id = $datoC['ID'];
  $name = $datoC['NAME'];
   ?>
  <div class="card">
    <div class="card-header" role="tab" id="heading<?php echo $id; ?>">
      <h5 class="mb-0">
        <a data-toggle="collapse" data-parsent="#accordion" href="#collapse<?php echo $id; ?>" aria-expanded="true" aria-controls="collapse<?php echo $id; ?>">
          <?php
          if ($datoC['NAME'] == 'COMPONENTES') {
            echo $name;
          }
          if ($datoC['NAME'] == 'ORDENADORES') {
            echo $name;
          }
          if ($datoC['NAME'] == 'PERIFÉRICOS') {
            echo $name;
          }
          if ($datoC['NAME'] == 'TV') {
            echo $name;
          }
          if ($datoC['NAME'] == 'SMARTPHONES') {
            echo $name;
          }?>
        </a>
      </h5>
    </div>

    <div id="collapse<?php echo $id; ?>" class="collapse" role="tabpanel" aria-labelledby="heading<?php echo $id; ?>">
      <div class="card-block">
<?php foreach ($datosSubCtg as $dato) {
  if ($dato['PARENTCATEGORY'] == $datoC['ID']) {?>
    <a href="index.php?controller=productos&action=show_manage_product&ID=<?php echo $dato['ID'];?>"><?php  echo $dato['SUBCATEGORIA']."<br>"; ?></a>
<?php
  }
}
?>
      </div>
    </div>
  </div>
  <?php } ?>
</div>
