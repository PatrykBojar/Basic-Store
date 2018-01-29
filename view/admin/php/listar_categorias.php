<select class="form-control form-control-lg" name="categoriaPadre">
<?php
//require_once("controller/categorias_controller.php");
foreach ($datosCtg as $dato) { ?>
  <?php echo "<option value='{$dato['ID']}'>{$dato['NAME']}</option>" ?>
<?php   } ?>
</select>
