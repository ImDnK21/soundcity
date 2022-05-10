<div class="account-sidebar">
  <h5 class="fw-bold mb-3">Panel de control</h5>
  <ul>
    <li>
      <a href="<?= APP_URL . 'account/profile' ?>" class="<?php if (Utils::routeIs('profile')) { echo 'active'; } ?>">Información de la cuenta</a>
    </li>
    <li class="d-none">
      <a href="<?= APP_URL . 'account/password' ?>" <?php if (Utils::routeIs('changePassword')) { echo 'active'; } ?>">Cambiar contraseña</a>
    </li>
    <li>
      <a href="<?= APP_URL . 'account/addresses' ?>" class="<?php if (Utils::routeIs('addresses')) { echo 'active'; } ?>">Mis direcciones</a>
    </li>
    <li>
      <a href="<?= APP_URL . 'account/orders' ?>" class="<?php if (Utils::routeIs('orders')) { echo 'active'; } ?>">Mis pedidos</a>
    </li>
    <li>
      <a href="<?= APP_URL . 'account/logout' ?>">Cerrar sesión</a>
    </li>
  </ul>
</div>
