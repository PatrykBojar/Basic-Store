<div id="carrusel" class="carousel slide col-12 col-lg-10 col-xl-8" data-ride="carousel">
  <ul class="carousel-indicators">

    <?php $cont = 0; foreach ($carrouselImg as $carrImg) { ?>
    <li data-target="#carrusel" data-slide-to="<?php echo $cont++;?>" class="<?php if($cont == 1) echo "active";?>"></li>
    <?php } ?>
  </ul>
  <div class="carousel-inner">
    <?php $imgCont = 0; foreach ($carrouselImg as $carrImg) { ?>
    <div class="carousel-item <?php if($imgCont == 0) echo "active";?>">
      <img src="<?php echo $carrImg['URL'];?>" alt="<?php echo $carrImg['CARRNAME'];?>" class="w-100" height="250">
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
