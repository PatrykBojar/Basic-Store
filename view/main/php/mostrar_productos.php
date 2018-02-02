<div class="card-group">
  <div class="row">
    <?php
    foreach ($datos as $dato) {
      ?>
    <div class="col-6 col-sm-6 col-md-4 col-xl-3">
      <div class="card">
        <img class="card-img-top img-fluid" src="view/main/img/a.jpg" alt="Card image">
        <div class="card-block">
          <h4 class="card-title"><?php echo $dato['NAME']?></h4>
          <p class="card-text">
            <?php echo $dato['SHORTDESCRIPTION'] ?>
          </p>
          <?php if($dato['DISCOUNTPERCENTAGE'] != NULL){ ?>
          <h5 class="text-primary">Precio antiguo: <?php echo money_format('%.2n', $dato['PRICE'])?> €</h5>
        <?php } else{ ?>
          <h5 class="text-primary">Precio: <?php echo money_format('%.2n', $dato['PRICE'])?> €</h5>

        <?php } ?>
          <h5 class="text-primary">Precio sin IVA: <?php echo money_format('%.2n', $dato['PRICE'] * (1-IVA/100))?> €</h5>
          <a href="#" class="btn btn-primary">Comprar</a>
        </div>
        <div class="card-footer">
          <?php if($dato['SPONSORED'] == 'Y'){ ?>
          <span class="badge badge-danger">Promoción: <?php echo $dato['SPONSORED'] ?></span>
        <?php } ?>
        <?php if($dato['DISCOUNTPERCENTAGE'] != NULL){ ?>
              <span class="badge badge-danger">Precio con duescuento: <?php echo money_format('%.2n', $dato['PRICE']  * (1-$dato['DISCOUNTPERCENTAGE']/100))?> €</span>
              <span class="badge badge-danger"><?php echo $dato['DISCOUNTPERCENTAGE']?>%</span>
            <?php } ?>
        </div>
      </div>
    </div>
    <?php   } ?>
  </div>
</div>
