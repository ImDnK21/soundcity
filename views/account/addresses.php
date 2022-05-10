<div class="container py-3">
  <div class="row">
    <div class="col-12 col-md-3 mb-3">
      <?php require_once('views/account/sidebar.php'); ?>
    </div>
    <div class="col-12 col-md-9 mb-3">
      <h3 class="fw-bold border-bottom mb-3 pb-3">Mis direcciones</h3>

      <?php if (isset($_SESSION['address'])) : ?>
      <div class="alert alert-secondary alert-dismissible fade show" role="alert">
        <?= $_SESSION['address'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php endif; unset($_SESSION['address']); ?> 

      <?php while ($address = $addresses->fetch_object()) : ?>
      <div class="card mb-3">
        <div class="card-body">
          <?php if ($addresses->num_rows > 1): ?>
          <a href="<?= APP_URL . 'account/deleteAddress?id=' . $address->id ?>" class="float-end ms-2">Eliminar</a>
          <?php endif; ?>
          <a class="float-end d-none">Editar</a> <!-- Deshabilitado porque no está programado -->
          <p class="mb-0">
            <?php 
            echo $address->street . ' #' . $address->number; 
            if(!empty($address->extra)) { echo ' (' . $address->extra . ')'; }
            echo ', ' . $address->commune;
            ?>
          </p>
          <p class="mb-0"><?= 'Región ' . $address->region . ', Chile' ?></p>
          <p class="mb-0"><?= 'Código postal: ' . $address->zipcode ?></p>
        </div>
      </div>
      <?php endwhile; ?>

      <button id="toggle-address-form" class="btn btn-primary mb-3">
        Agregar nueva dirección
      </button>

      <div id="address-form" class="d-none">
        <form action="<?= APP_URL . 'account/saveAddress' ?>" method="POST">
          <div class="row">
            <div class="col-12 mb-3">
              <label for="street" class="form-label required">Dirección</label>
              <input type="text" name="street" placeholder="Ej: Av. Siempre Viva " class="form-control">
            </div>
            <div class="col-6 mb-3">
              <label for="number" class="form-label required">Número</label>
              <input type="number" name="number" placeholder="Ej: 1234" class="form-control">
            </div>
            <div class="col-6 mb-3">
              <label for="extra" class="form-label optional">Dpto. / Casa / Oficina (opcional)</label>
              <input type="text" name="extra" placeholder="Ej: piso 5, dpto. 1" class="form-control">
            </div>
            <div class="col-12 mb-3">
              <label for="zipcode" class="form-label required">Código postal</label>
              <a href="https://www.correos.cl/codigo-postal" target="_blank">Obtén tu código postal aquí</a>
              <input type="number" name="zipcode" class="form-control">
            </div>
            <div class="col-12 mb-3">
              <label for="region" class="form-label required">Región</label>
              <select name="region" class="form-select">
                <option selected disabled>Selecciona tu región</option>
                <?php while ($region = $regions->fetch_object()) : ?>
                <option value="<?= $region->id ?>"><?= $region->name ?></option>
                <?php endwhile; ?>
              </select>
            </div>
            <div class="col-12 mb-3">
              <label for="commune" class="form-label required">Comuna</label>
              <input type="text" name="commune" class="form-control">
            </div>
          </div>
          <button class="btn btn-primary">Agregar dirección</button>
        </form>
      </div>
    </div>
  </div>
</div>
