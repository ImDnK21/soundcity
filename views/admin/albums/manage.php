<div class="container py-3">
  <div class="row">
    <?php require_once('views/admin/sidebar.php') ?>
    <div class="col-12 col-md-9">
      <?php if (isset($_SESSION['album'])): ?>
      <div class="alert alert-secondary alert-dismissible fade show" role="alert">
        Acción realizada con éxito.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php endif; unset($_SESSION['album']); ?>
      <div class="mb-3">
        <div class="">
          <h2 class="fw-bold mb-3 float-start">Gestión de productos</h2>
          <a href="<?= APP_URL . 'admin/addProduct' ?>" class="btn btn-primary float-end">Agregar producto</a>
        </div>
        <table id="albums" class="table table-bordered">
          <thead>
            <tr>
              <th>Álbum</th>
              <th>Artista</th>
              <th>Precio</th>
              <th>Stock</th>
              <th style="width: 20%">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($album = $albums->fetch_object()): ?>
            <tr class="align-middle">
              <td>
                <a href="<?= APP_URL . 'album/view?id=' . $album->id ?>"><?= $album->title ?></a>
              </td>
              <td><?= $album->author ?></td>
              <td><?= Utils::toCLP($album->price) ?></td>
              <td><?= $album->stock ?></td>
              <td>
                <a href="<?= APP_URL . 'admin/editProduct?id=' . $album->id ?>" class="text-primary">Editar</a>
                <a data-bs-toggle="modal" data-bs-target="#deleteAlbum<?=$album->id?>" class="text-danger">Eliminar</a>
              </td>
            </tr>
            <div class="modal fade" id="deleteAlbum<?=$album->id?>" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title fs-6 fw-bold">¿Estás seguro que deseas eliminar este álbum?</h5>
                    <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                  </div>
                  <div class="modal-body text-center">
                    Estás eliminando <b><?= $album->title ?></b> de <b><?= $album->author ?></b>.
                    Una vez eliminado, no podrás recuperarlo.
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a href="<?= APP_URL . 'admin/deleteProduct?id=' . $album->id ?>" class="btn btn-danger">Eliminar</a>
                  </div>
                </div>
              </div>
            </div>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
