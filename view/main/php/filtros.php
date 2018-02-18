<button type="button" class="btn btn-primary col-12" data-toggle="modal" data-target="#filtros">Ver filtros...</button>

<div class="modal fade" id="filtros">
  <form action="index.php?controller=productos&action=filterProductsBrands" method="post">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Filtrar productos</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-4">
              <p class="font-weight-bold text-center">Marcas</p>
              <hr>
              <?php foreach ($brandsWithPrd as $brand){ ?>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="<?php echo $brand['BRANDID'];?>" value="<?php echo $brand['BRANDID'];?>" name="filtro[]">
                <label class="form-check-label" for="<?php echo $brand['BRANDID'];?>"><?php echo $brand['BRANDNAME'];?></label>
              </div>
              <?php }?>
            </div>
            <div class="form-group col-8">
              <p class="font-weight-bold text-center">Precio</p>
              <hr>
              <?php foreach ($maxMin as $precio) {?>
              <input type="number" class="form-control col-12" name="minPrice" id="minPrice" value="<?php echo aInt($precio['MINPRICE'])?>" placeholder="Precio mínimo para el filtro..." min="<?php echo aInt($precio['MINPRICE'])?>">
              <small class="font-italic">Este filtro selecciona de forma automática el precio mínimo disponible en nuestra tienda :)</small>
              <input type="number" class="form-control col-12 mt-3" name="maxPrice" id="maxPrice" placeholder="Precio máximo para el filtro..." min="0">
              <small class="font-italic">Producto más caro disponible: <?php echo enEuro($precio['MAXPRICE'])?></small>
              <?php }  ?>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-success col-12">Filtrar</button>
        </div>
      </div>
    </div>
  </form>
</div>
