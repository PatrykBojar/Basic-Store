  <?php
    if(!empty($datos)){?>
      <div class="row">
<div class="card-deck carousel">
    <?php foreach ($datos as $dato) { ?>
      <div class="col-12 col-md-6 col-xl-4 mt-5">
        <div id="<?php echo $dato['ID']; ?>" class="card">
          <?php foreach ($images as $img) {
              if ($dato['ID'] == $img['ID']) {
                if($img['URL'] != NULl){ ?>
          <img class="card-img-top img-fluid img-product" data-toggle="modal" data-target="#showMore<?php echo $dato['ID']; ?>" src="<?php echo $img['URL']; ?>" alt="<?php echo $dato['NAME'];?>">

          <?php if($dato['SPONSORED'] == 'Y'){ ?>
          <span class="badge badge-warning font-weight-bold prom-badge mt-3 ml-3">PROMOCIÓN</span>
          <?php } }else{?>
          <img class="card-img-top img-fluid img-product" src="view/img_product/error_img/no-image.svg" data-toggle="modal" data-target="#showMore<?php echo $dato['ID']; ?>" alt="No existe una imagen para este producto.">
        <?php } } } ?>
          <div class="card-block">
            <h4 class="card-title text-center p-2"><?php echo $dato['NAME'];?></h4>
            <p class="card-text text-center p-2">
              <?php echo $dato['SHORTDESCRIPTION'] ?>
            </p>
            <?php if($dato['DISCOUNTPERCENTAGE'] != NULL){ ?>
              <hr>
            <h5 class="text-dark text-center font-weight-bold"><?php echo enEuro($dato['PRICE']  * (1-$dato['DISCOUNTPERCENTAGE']/100))?></h5>
            <h6 class="text-muted text-center"><del><?php echo enEuro($dato['PRICE'])?></del><span class="badge badge-descuento font-weight-bold"><?php echo $dato['DISCOUNTPERCENTAGE'] ?>%</span></h6>
            <?php } else{ ?>
              <hr>
            <h5 class="text-dark text-center font-weight-bold"><?php echo enEuro($dato['PRICE'])?></h5>
            <?php } ?>
            <?php if($dato['STOCK'] < 5 && $dato['STOCK'] > 0){ ?>
              <form action="index.php?controller=productos&action=show_product_page&id=<?php echo $dato['ID'];?>&sc=<?php echo $dato['CATEGORY']; ?>" method="post">
                <button class="btn btn-primary col-12" type="submit"></a>Comprar</button>
              </form>
              <span class="badge badge-warning">¡Quedan pocos!</span>
            <?php }elseif ($dato['STOCK'] >= 5) { ?>
              <form action="index.php?controller=productos&action=show_product_page&id=<?php echo $dato['ID'];?>&sc=<?php echo $dato['CATEGORY']; ?>" method="post">
                <button class="btn btn-primary col-12" type="submit"></a>Comprar</button>
              </form>
            <?php }else{ ?>
            <button class="btn btn-primary disabled col-12">¡Sin stock!</button>
            <?php    } ?>

          </div>
          <div class="card-footer">
<span><?php echo "Stock ".$dato['STOCK'];  ?></span>
          </div>
        </div>
      </div>
      <div class="modal fade" id="showMore<?php echo $dato['ID']; ?>">
        <form action="index.php?controller=productos&action=show_product_page&id=<?php echo $dato['ID'];?>&sc=<?php echo $dato['CATEGORY']; ?>" method="post">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title"><?php echo $dato['NAME'] ?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <?php foreach ($images as $img) {
                    if ($dato['ID'] == $img['ID']) {
                      if($img['URL'] != NULl){ ?>
                <img class="card-img-top img-fluid" src="<?php echo $img['URL']; ?>" alt="<?php echo $dato['NAME'];?>">
                <?php }else{?>
                <img class="card-img-top img-fluid" src="view/img_product/error_img/no-image.svg" alt="No existe una imagen para este producto.">
                <?php } } } ?>
                <?php if($dato['LONGDESCRIPTION'] == NULL){ ?>
                <p>Este producto aún no tiene ninguna descripción. Lo sentimos.</p>
                <?php }else{ ?>
                <p>
                  <?php echo $dato['LONGDESCRIPTION']; ?>
                </p>
                <?php  } ?>
                <?php if($dato['DISCOUNTPERCENTAGE'] != NULL){ ?>
                <p class="text-primary">Precio con duescuento:
                  <?php echo enEuro($dato['PRICE']  * (1-$dato['DISCOUNTPERCENTAGE']/100))?>
                </p>
                <span class="badge badge-danger">Descuento: <?php echo $dato['DISCOUNTPERCENTAGE']?>%</span>
                <?php }else{ ?>
                <p class="text-primary">Precio:
                  <?php echo enEuro($dato['PRICE'])?>
                </p>
                <?php } ?>
              </div>
              <div class="modal-footer">
                <?php if($dato['STOCK'] > 0){ ?>
                <button type="submit" class="btn btn-outline-success col-12">¡Lo quiero!</button>
              <?php }else{ ?>
                <button class="btn btn-primary col-12">Ver producto</button>
              <?php } ?>
              </div>
            </div>
          </div>
        </form>
      </div>
    <?php   }}else{?>
<div class="container text-center">
  <h3 class="text-info">No hemos podido encontrar ningun producto con tu criterio de búsqueda :(</h3>
</div>
    <?php } ?>
  </div>
</div>
</div>
