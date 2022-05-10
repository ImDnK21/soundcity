<?php 
if(!isset($_SESSION['logged'])): 
?>
<div class="container py-3">
  <div class="row justify-content-center">
    <div class="col-12 col-md-6 mb-3">
      <div class="card">
        <div class="card-header">Inicia sesión</div>
        <div class="card-body">
          
          <?php if (isset($_SESSION['login_message']) && isset($_SESSION['login_message_type'])): ?>
          <div class="alert alert-<?= $_SESSION['login_message_type'] ?> alert-dismissible fade show">
            <?= $_SESSION['login_message'] ?>
            <button type="button" data-bs-dismiss="alert" aria-label="Cerrar" class="btn-close"></button>
          </div>
          <?php unset($_SESSION['login_message']); unset($_SESSION['login_message_type']); endif; ?>

          <form action="<?= APP_URL . 'account/signin' ?>" method="POST">
            <div class="mb-3">
              <label for="email" class="form-label">Correo electrónico</label>
              <input type="text" name="email" class="form-control">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Contraseña</label>
              <input type="password" name="password" class="form-control">
            </div>
            <div class="row">
              <div class="col-6">
                <button class="btn btn-link">¿Olvidaste tu contraseña?</button>
              </div>
              <div class="col-6">
                <button type="submit" class="btn btn-primary float-end">Ingresar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6 mb-3">
      <div class="card">
        <div class="card-header">Cliente nuevo</div>
        <div class="card-body">
          <?php if (isset($_SESSION['signup_message']) && isset($_SESSION['signup_message_type'])): ?>
          <div class="alert alert-<?= $_SESSION['signup_message_type'] ?> alert-dismissible fade show">
            <?= $_SESSION['signup_message'] ?>
            <button type="button" data-bs-dismiss="alert" aria-label="Cerrar" class="btn-close"></button>
          </div>
          <?php unset($_SESSION['signup_message']); unset($_SESSION['signup_message_type']); endif; ?>
          <form action="<?= APP_URL . 'account/signup' ?>" method="POST">
            <div class="row">
              <div class="col-12">
                <div class="mb-3">
                  <label for="rut" class="form-label">RUT</label>
                  <input type="text" name="rut" placeholder="ej: 12.345.679-9" class="form-control">
                </div>
              </div>
              <div class="col-6">
                <div class="mb-3">
                  <label for="firstname" class="form-label">Nombre</label>
                  <input type="text" name="firstname" class="form-control">
                </div>
              </div>
              <div class="col-6">
                <div class="mb-3">
                  <label for="lastname" class="form-label">Apellidos</label>
                  <input type="text" name="lastname" class="form-control">
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Correo electrónico</label>
              <input type="text" name="email" class="form-control">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Contraseña</label>
              <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3">
              <label for="confirm-password" class="form-label">Confirmar contraseña</label>
              <input type="password" name="confirm-password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary float-end">Registrarse</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php else: 
  header('Location: ' . APP_URL . 'account/profile');
endif; ?>
