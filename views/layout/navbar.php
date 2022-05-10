  <nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
      <a href="<?= APP_URL ?>" title="Página de inicio" class="navbar-brand fw-bold">
        <img src="<?= APP_URL . 'assets/img/logo_colorized.png' ?>" alt="<?= APP_NAME ?>" height="35">
      </a>
      <button type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Alternar navegación" class="navbar-toggler">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a href="<?= APP_URL . 'home/index' ?>" class="nav-link">Inicio</a>
          </li>
          <li class="nav-item">
            <a href="<?= APP_URL . 'album/index' ?>" class="nav-link">Catálogo</a>
          </li>
          <li class="nav-item">
            <a href="<?= APP_URL . 'home/index#contact' ?>" class="nav-link">Contáctanos</a>
          </li>
        </ul>
        <form action="<?= APP_URL . 'album/index' ?>" class="d-flex mx-auto">
          <input name="search" placeholder="Buscar en el catálogo" class="form-control me-2">
          <button type="submit" class="btn btn-outline-primary">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </form>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a id="theme" role="button" data-bs-toggle="dropdown" aria-expanded="false" class="nav-link dropdown-toggle">Aspecto</a>
            <ul id="themes" aria-labelledby="theme" class="dropdown-menu dropdown-menu-end">
              <li id="system">
                <a class="dropdown-item">Usar tema del dispositivo</a>
              </li>
              <li id="light">
                <a class="dropdown-item">Tema claro</a>
              </li>
              <li id="dark">
                <a class="dropdown-item">Tema oscuro</a>
              </li>
            </ul>
          </li>
          <?php if (isset($_SESSION['admin'])) { ?>
            <li class="nav-item">
              <a href="<?= APP_URL . 'admin/index' ?>" class="nav-link fw-bold">Administración</a>
            </li>
          <?php } ?>
          <?php if (isset($_SESSION['logged'])) { ?>
          <li class="nav-item dropdown">
            <a id="account" role="button" data-bs-toggle="dropdown" aria-expanded="false" class="nav-link dropdown-toggle">Mi cuenta</a>
            <ul aria-labelledby="account" class="dropdown-menu">
              <li><a href="<?= APP_URL . 'account/profile' ?>" class="dropdown-item">Perfil</a></li>
              <li><a href="<?= APP_URL . 'cart/index' ?>" class="dropdown-item">Carro de compras</a></li>
              <li><a href="" class="dropdown-item">Mis pedidos</a></li>
              <li><a href="<?= APP_URL . 'account/logout' ?>" class="dropdown-item">Cerrar sesión</a></li>
            </ul>
          </li>
          <?php } else { ?>
          <li class="nav-item">
            <a href="<?= APP_URL . 'account/login' ?>" class="nav-link">Iniciar sesión</a>
          </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
