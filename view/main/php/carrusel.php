<div id="carrusel" class="carousel slide col-12 col-lg-10 col-xl-12 mt-4 d-none d-sm-block pr-sm-0" data-ride="carousel">
  <ul class="carousel-indicators">

    <?php $cont = 0; foreach ($carrouselImg as $carrImg) { ?>
    <li data-target="#carrusel" data-slide-to="<?php echo $cont++;?>" class="<?php if($cont == 1) echo "active";?>"></li>
    <?php } ?>
  </ul>
  <div class="carousel-inner">
    <?php $imgCont = 0; foreach ($carrouselImg as $carrImg) { ?>
    <div class="carousel-item <?php if($imgCont == 0) echo "active";?>">
      <img src="<?php echo $carrImg['URL'];?>" alt="<?php echo $carrImg['CARRNAME'];?>" class="w-100" height="250">
      <div class="carousel-caption">
          <span class="badge badge-info"><?php echo $carrImg['CARRNAME'] ?></span>
          <span class="badge badge-danger"><?php echo enEuro($carrImg['PRICE']  * (1-$carrImg['DISCOUNTPERCENTAGE']/100))?></span>
          <?php if($carrImg['DISCOUNTPERCENTAGE'] != NULL){ ?>
            <span class="badge badge-danger"><?php echo $carrImg['DISCOUNTPERCENTAGE']?>%</span>
          <?php }else{
                echo "";
          } ?>
     </div>

    </div>
    <?php  $imgCont++; } ?>
  </div>
  <a class="carousel-control-prev" href="#carrusel" data-slide="prev">
<span class="carousel-control-prev-icon"></span>
</a>
  <a class="carousel-control-next" href="#carrusel" data-slide="next">
<span class="carousel-control-next-icon"></span>
</a>
</div>
