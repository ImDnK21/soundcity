<div class="container py-3">
  <div class="row justify-content-center">
    <div class="col-12 col-md-6">
      <div class="card">
        <div class="card-header">
          <span class="fw-bold">Agregar artista</span>
        </div>
        <div class="card-body">
          <form action="<?= APP_URL . 'author/save' ?>" method="POST">
            <div class="mb-3">
              <label for="name" class="form-label">Nombre del artista</label>
              <input type="text" name="name" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
