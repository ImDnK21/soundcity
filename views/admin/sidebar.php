<div class="col-12 col-md-3 mb-3">
  <ul class="list-group">
    <li class="list-group-item <?php if (Utils::routeIs('index')) { echo 'active'; } ?>">
      <a href="<?= APP_URL . 'admin/index' ?>">Últimas acciones</a>
    </li>
    <li class="list-group-item <?php if (Utils::routeIs('orders')) { echo 'active'; } ?>">
      <a href="">Todos los pedidos</a>
    </li>
    <li class="list-group-item <?php if (Utils::routeIs('manageAuthors')) { echo 'active'; } ?>">
      <a href="<?= APP_URL . 'admin/manageAuthors' ?>">Gestionar artistas</a>
    </li>
    <li class="list-group-item <?php if (Utils::routeIs('manageProducts')) { echo 'active'; } ?>">
      <a href="<?= APP_URL . 'admin/manageProducts' ?>">Gestionar productos</a>
    </li>
    <li class="list-group-item <?php if (Utils::routeIs('clients')) { echo 'active'; } ?>">
      <a href="">Listar clientes</a>
    </li>
  </ul>
</div>
