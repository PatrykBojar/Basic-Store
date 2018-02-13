<nav class="navbar navbar-light bg-dark justify-content-between col-12">
  <a class="navbar-brand text-success display-4" href="#"><img src="view/main/img/main-logo.png" id="main-logo" alt="Dragón verde">Green Dragon</a>
  <?php  if ($total_paginas > 1) {
    if($pagina == 0){?>
      <form class="form-inline" action="index.php?controller=productos&action=buscador&pagina=<?php echo $pagina ?>" method="post">

  <?php } }?>
    <input id="name" name="name" class="form-control mr-sm-2 font-weight-bold" type="search" size="35" placeholder="Buscar" aria-label="Buscar">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
  </form>

  <?php
    if(isset($_SESSION['user'])){
      echo "Bienvenido, " . $_SESSION['user'];?>
      <form action="index.php?controller=usuarios&action=logout" method="post">
        <input type="submit" name="logout" value="Salir">
      </form>
    <?php } else {?>
      <form action="index.php?controller=usuarios&action=show_login_page" method="post">
        <input type="submit" name="login" value="Identificarse">
      </form>
    <?php } ?>
</nav>
