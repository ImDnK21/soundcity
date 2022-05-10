<div class="container py-3">
  <div class="row">
    <div class="col-12 col-md-3 mb-3">
      <?php require_once('views/account/sidebar.php'); ?>
    </div>
    <div class="col-12 col-md-9 mb-3">
      <h3 class="fw-bold border-bottom mb-3 pb-3">Información de la cuenta</h3>
      <h4 class="mb-3">Información de contacto</h4>
      <div class="row">
        <div class="col-12 col-md-8 mb-3">
          <p class="fw-bold mb-1"><?= $_SESSION['logged']->firstname . ' ' . $_SESSION['logged']->lastname ?></p>
          <p class="mb-1"><?= $_SESSION['logged']->email ?></p>
          <p class="mb-1">
            <?php switch($_SESSION['logged']->role) {
              case 'admin': echo '<b>Administrador</b>';
                break;
              case 'user': echo 'Usuario';
                break;
              default: echo 'Invitado';
                break;
            } ?>
          </p>
        </div>
        <div class="col-12 col-md-4 mb-3">
          <button id="toggle-account-form" class="btn btn-primary">
            <i class="fa-solid fa-pen me-2"></i>
            Actualizar datos
          </button>
        </div>
        <div id="account-form" class="col-6 mb-3 d-none">
          <form action="<?= APP_URL . 'account/update?id=' . $_SESSION['logged']->id ?>" method="POST">
            <div class="mb-3">
              <label for="firstname" class="form-label required">Nombres</label>
              <input type="text" name="firstname" value="<?= $_SESSION['logged']->firstname ?>" class="form-control">
            </div>
            <div class="mb-3">
              <label for="lastname" class="form-label required">Apellidos</label>
              <input type="text" name="lastname" value="<?= $_SESSION['logged']->lastname ?>" class="form-control">
            </div>
            <button class="btn btn-primary btn-block">Actualizar información</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
