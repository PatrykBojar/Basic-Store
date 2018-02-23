<div class="row">
  <nav class="navbar navbar-light bg-dark justify-content-between col-12">
    <a class="navbar-brand text-success display-4 pl-4 pl-sm-4" href="index.php?controller=productos&action=show_start_page"><img src="view/main/img/main-logo.png" id="main-logo" alt="Dragón verde">Green Dragon</a>
    <form class="form-inline p-3 col-12 col-lg-10" action="index.php?controller=productos&action=buscador" method="post">
      <input id="name" name="name" class="form-control col-12 mr-sm-3 col-sm-8 col-md-12 col-lg-4" type="search" size="35" placeholder="Buscar" aria-label="Buscar">
      <button class="btn btn-outline-success my-2 my-sm-0 col-12 col-sm-3 col-md-12 mt-md-2 col-lg-2 mb-lg-2" type="submit">Buscar</button>

      <?php
          if(isset($_SESSION['user'])){
            if ($_SESSION['user'] == "admin") {?>
        <div class="dropdown pt-sm-2 pl-md-2 mb-2">
          <button class="btn btn-primary dropdown-toggle" type="button" id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo $_SESSION['user'];?>
              </button>
          <div class="dropdown-menu col-12" aria-labelledby="userMenu">
            <a href="index.php?controller=productos&action=show_manage_product" class="dropdown-item btn">Zona ADMIN</a>
            <a href="index.php?controller=usuarios&action=logout" class="dropdown-item btn text-danger">Salir</a>
          </div>
        </div>
        <?php }else{ ?>
        <div class="dropdown pt-sm-2 pl-md-2 mb-2">
          <button class="btn btn-primary dropdown-toggle" type="button" id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo  $_SESSION['user'];?>
          </button>
          <div class="dropdown-menu" aria-labelledby="userMenu">
            <button class="dropdown-item" type="button" disabled>Editar perfil</button>
            <a href="index.php?controller=order&action=orderHistory" class="dropdown-item btn" type="button">Historial de compras</a>
            <a href="index.php?controller=usuarios&action=logout" class="dropdown-item btn text-danger">Salir</a>
          </div>
        </div>
        <?php }?>
        <?php } else {?>
          <a href="index.php?controller=usuarios&action=show_login_page" class="btn btn-success font-weight-bold col-12 col-sm-12 mt-sm-2 mt-md-2 col-lg-3 ml-lg-5 mb-lg-2" name="login">Identificarse</a>
        <?php } ?>
    </form>
    <div class="col-12 justify-content-end ml-4 ml-lg-0 input-group pt-3 pb-auto bg-inverse dropdown">
      <div class="text-right pr-5">
        <a class="d-inline-flex" href="index.php?controller=order&action=show_cart">
          <div class=" bg-dark">
            <img src="view/main/img/shopping_cart.png" class="img-fluid img-carrito" alt="Carrito de compra">
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
</div>
  </nav>
</div>
