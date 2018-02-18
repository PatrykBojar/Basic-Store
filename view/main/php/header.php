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
          <a href="index.php?controller=order&action=orderHistory"class="dropdown-item btn" type="button">Historial de compras</a>
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
      <div class="col-3 p-2 input-group pt-3 pb-auto bg-inverse">
        <div class="w-50 text-right pr-5 " onmouseover="myFunction()" onmouseout="myFunction2()">
          <a class="d-inline-flex" href="index.php?controller=order&action=show_cart">
            <div class="">
              <img src="view/main/img/shopping_cart.png" class="img-fluid img-carrito" alt="">
              <span class="badge badge-light"><?php if (empty(isset($_SESSION['cart']))) {
            echo "0";
          } else {
            $length = count($_SESSION['cart']);
            $counter = 0;
             for ($i=0; $i < $length; $i++) {
              $counter = $_SESSION['cart'][$i]['QUANTITY'] + $counter;
          }
          echo $counter;
        }?></span>
            </div>
          </a>
        </div>
      </div>

  </nav>
</div>
