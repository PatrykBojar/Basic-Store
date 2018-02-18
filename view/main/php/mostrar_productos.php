  <?php
    if(!empty($datos)){?>
      <div class="row">

    <?php foreach ($datos as $dato) {
      ?>
      <div class="col-12 col-md-6 col-xl-4">
        <div id="<?php echo $dato['ID']; ?>" class="card card-height">
          <?php foreach ($images as $img) {
              if ($dato['ID'] == $img['ID']) {
                if($img['URL'] != NULl){ ?>
          <img class="card-img-top img-fluid img-product" data-toggle="modal" data-target="#showMore<?php echo $dato['ID']; ?>" src="<?php echo $img['URL']; ?>" alt="<?php echo $dato['NAME'];?>">
          <?php }else{?>
          <img class="card-img-top img-fluid img-product" src="view/img_product/error_img/no-image.svg" data-toggle="modal" data-target="#showMore<?php echo $dato['ID']; ?>" alt="No existe una imagen para este producto.">
        <?php } } } ?>
          <div class="card-block">
            <h4 class="card-title"><?php echo $dato['NAME'];?></h4>
            <p class="card-text">
              <?php echo $dato['SHORTDESCRIPTION'] ?>
            </p>
            <?php if($dato['DISCOUNTPERCENTAGE'] != NULL){ ?>
            <h5 class="text-primary">Precio antiguo: <?php echo enEuro($dato['PRICE'])?></h5>
            <?php } else{ ?>
            <h5 class="text-primary">Precio: <?php echo enEuro($dato['PRICE'])?></h5>
            <?php } ?>
            <h5 class="text-primary">Precio sin IVA: <?php echo enEuro($dato['PRICE'] * (1-IVA/100))?></h5>
            <?php if($dato['STOCK'] < 5 && $dato['STOCK'] > 0){ ?>
              <form action="index.php?controller=productos&action=show_product_page&id=<?php echo $dato['ID'];?>&sc=<?php echo $dato['CATEGORY']; ?>" method="post">
                <button class="btn btn-primary" type="submit"></a>Comprar</button>
              </form>
              <span class="badge badge-warning">¡Quedan pocos!</span>
            <?php }elseif ($dato['STOCK'] >= 5) { ?>
              <form action="index.php?controller=productos&action=show_product_page&id=<?php echo $dato['ID'];?>&sc=<?php echo $dato['CATEGORY']; ?>" method="post">
                <button class="btn btn-primary" type="submit"></a>Comprar</button>
              </form>
            <?php }else{ ?>
            <button class="btn btn-primary disabled">¡Sin stock!</button>
            <?php    } ?>
            <span><?php echo "Stock ".$dato['STOCK'];  ?></span>
          </div>
          <div class="card-footer">
            <?php if($dato['SPONSORED'] == 'Y'){ ?>
            <span class="badge badge-danger">Promoción: <?php echo $dato['SPONSORED'] ?></span>
            <?php } ?>
            <?php if($dato['DISCOUNTPERCENTAGE'] != NULL){ ?>
            <span class="badge badge-danger">Precio con duescuento: <?php echo enEuro($dato['PRICE']  * (1-$dato['DISCOUNTPERCENTAGE']/100))?></span>
            <span class="badge badge-danger"><?php echo $dato['DISCOUNTPERCENTAGE']?>%</span>
            <?php } ?>
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
                <button type="submit" class="btn btn-outline-success">¡Lo quiero!</button>
              <?php }else{ ?>
                <button class="btn btn-primary">Ver producto</button>
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
