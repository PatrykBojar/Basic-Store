<div id="accordion" role="tablist" aria-multiselectable="true">
  <?php foreach ($datosCtg as $datoCtg) { ?>
  <div class="card">
    <div class="card-header" role="tab" id="heading<?php echo $datoCtg['ID'];?>">
      <h5 class="mb-0">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $datoCtg['ID'];?>" aria-expanded="true" aria-controls="collapse<?php echo $datoCtg['ID'];?>">
          <?php echo $datoCtg['NAME']; ?>
        </a>
      </h5>
    </div>

    <div id="collapse<?php echo $datoCtg['ID'];?>" class="collapse show" role="tabpanel" aria-labelledby="heading<?php echo $datoCtg['ID'];?>">
      <div class="card-block">
        <?php echo $datoCtg['PARENTCATEGORY']; ?>
      </div>
    </div>
  </div>
    </div>
  <?php  } ?>
</div>
