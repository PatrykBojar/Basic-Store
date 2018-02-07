<div class="card-group col-8">
  <div class="row">
    <?php
    foreach ($datos as $dato) {
      ?>
      <div class="col-12 col-md-6 col-xl-4">
        <div class="card">
          <img class="card-img-top img-fluid" src="view/main/img/a.jpg" alt="Card image">
          <div class="card-block">
            <h4 class="card-title"><?php echo $dato['NAME']?></h4>
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
            <button class="btn btn-primary"><a href="#"></a>Comprar</button>
            <span class="badge badge-warning">¡Quedan pocos!</span>
            <?php }elseif ($dato['STOCK'] >= 5) { ?>
            <button class="btn btn-primary"><a href="#"></a>Comprar</button>
          <?php }else{ ?>
            <button class="btn btn-primary disabled"><a href="#"></a>¡Sin stock!</button>
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
      <?php   } ?>
  </div>
</div>
