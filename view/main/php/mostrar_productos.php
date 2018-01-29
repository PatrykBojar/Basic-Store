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
          <h5 class="text-primary">Precio: <?php echo $dato['PRICE'] * 1.21?> €</h5>
          <a href="#" class="btn btn-primary">Comprar</a>
           <p><a href="index.php?controller=productos&action=ver_mas_alpha">Mostrar más</a></p>
        </div>
        <div class="card-footer">
          <span class="badge badge-danger">Promoción: <?php echo $dato['SPONSORED'] ?></span>
        </div>
      </div>
    </div>
    <?php   } ?>
  </div>
</div>
