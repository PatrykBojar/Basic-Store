<nav class="navbar navbar-light bg-dark justify-content-between">
  <a class="navbar-brand text-success display-4" href="#"><img src="view/main/img/main-logo.png" id="main-logo" alt="Dragón verde">Green Dragon</a>
  <form class="form-inline">
    <input class="form-control mr-sm-2 font-weight-bold" type="search" size="35" placeholder="Buscar" aria-label="Buscar">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    <?php echo $_SESSION['user'];
    var_dump($_SESSION) ?>
  </form>
</nav>
