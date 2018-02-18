<div class="row">
  <nav class="navbar navbar-light bg-dark justify-content-between col-12">
    <a class="navbar-brand text-success display-4" href="index.php?controller=productos&action=show_start_page"><img src="view/main/img/main-logo.png" id="main-logo" alt="Dragón verde">Green Dragon</a>
    <form class="form-inline" action="index.php?controller=productos&action=buscador" method="post">
      <input id="name" name="name" class="form-control mr-sm-2 font-weight-bold" type="search" size="35" placeholder="Buscar" aria-label="Buscar">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
    <?php
    if(isset($_SESSION['user'])){
      if ($_SESSION['user'] == "admin") {?>
      <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo  $_SESSION['user'];?>
        </button>
        <div class="dropdown-menu" aria-labelledby="userMenu">
          <a href="index.php?controller=productos&action=show_manage_product" class="dropdown-item btn">Zona ADMIN</a>
          <a href="index.php?controller=usuarios&action=logout" class="dropdown-item btn text-danger">Salir</a>
        </div>
      </div>
      <?php }else{ ?>
      <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo  $_SESSION['user'];?>
    </button>
        <div class="dropdown-menu" aria-labelledby="userMenu">
          <button class="dropdown-item" type="button" disabled>Editar perfil</button>
          <button class="dropdown-item" type="button">Historial de compras</button>
          <a href="index.php?controller=usuarios&action=logout" class="dropdown-item btn text-danger">Salir</a>
        </div>
      </div>
      <?php }?>
      <form action="index.php?controller=usuarios&action=logout" method="post">
        <input type="submit" name="logout" value="Salir">
      </form>
      <?php } else {?>
      <form action="index.php?controller=usuarios&action=show_login_page" method="post">
        <input type="submit" name="login" value="Identificarse">
      </form>
      <?php } ?>
      <a href="index.php?controller=carrito&action=ver_carrito">
        <button type="button" class="btn btn-success">
          <img class="img-fluid img-carrito" src="view/main/img/shopping_cart.png" alt="Carrito de compra">
          <span class="badge badge-light"><?php $cartNum = (empty($_SESSION['cart'])) ? "0" : count($_SESSION['cart']); echo $cartNum; ?></span>
        </button>
      </a>

  </nav>
</div>
