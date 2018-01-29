<table class="table table-hover table-inverse">
  <thead>
    <tr>
      <th>ID</th>
      <th>NOMBRE</th>
      <th>CATEGORÍA/SUBCATEGORÍA</th>
      <th>MARCA</th>
      <th>PRECIO</th>
    </tr>
  </thead>
  <tbody>
    <?php
        foreach($datos as $dato){ ?>
    <tr>
      <?php
      echo "<td>{$dato['ID']}</td>";
      echo "<td>{$dato['NAME']}</td>";
      echo "<td>{$dato['CATEGORY']}</td>";
      echo "<td>{$dato['BRAND']}</td>";
      echo "<td>{$dato['PRICE']}</td>";
      ?>
    </tr>
  </tbody>
<?php } ?>
</table>
