<div class="container py-3">
  <div class="row">
    <?php require_once('views/admin/sidebar.php') ?>
    <div class="col-12 col-md-9">
      <?php if (isset($_SESSION['author'])): ?>
      <div class="alert alert-secondary alert-dismissible fade show" role="alert">
        Acción realizada con éxito.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php endif; unset($_SESSION['author']); ?>
      <div class="mb-3">
        <div class="">
          <h2 class="fw-bold mb-3 float-start">Gestión de artistas</h2>
          <a href="<?= APP_URL . 'admin/addAuthor' ?>" class="btn btn-primary float-end">Agregar artista</a>
        </div>
        <table class="table table-bordered table-responsive">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th style="width: 20%">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($author = $authors->fetch_object()): ?>
              <tr class="align-middle">
                <td><?= $author->id ?></td>
                <td><?= $author->name ?></td>
                <td>
                  <a href="<?= APP_URL . 'admin/editProduct?id=' . $author->id ?>" class="text-primary">Editar</a>
                  <a data-bs-toggle="modal" data-bs-target="#deleteAuthor<?=$author->id?>" class="text-danger">Eliminar</a>
                </td>
              </tr>
              <div class="modal fade" id="deleteAuthor<?=$author->id?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title fs-6 fw-bold">¿Estás seguro que deseas eliminar este artista?</h5>
                      <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                    </div>
                    <div class="modal-body text-center text-danger">
                      <div class="align-middle mb-2">
                        <i class="fa-solid fa-circle-exclamation me-2"></i>
                        ¡Ten cuidado!
                      </div>
                      Estás eliminando el artista <b><?= $author->name ?></b>.
                      Esto podría ocasionar que todos los álbums que pertenecen a este artista se eliminen.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                      <a href="<?= APP_URL . 'admin/deleteAuthor?id=' . $author->id ?>" class="btn btn-danger">Eliminar</a>
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
