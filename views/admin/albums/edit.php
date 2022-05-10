<div class="container py-3">
  <div class="card">
    <div class="card-header">
      <span class="fw-bold">Editando álbum "<?= $album->title ?>"</span>
    </div>
    <div class="card-body">
      <form action="<?= APP_URL . 'album/update?id=' . $album->id ?>" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="col-12 col-md-4">
            <div class="mb-3">
              <label for="author" class="form-label required">Artista</label>
              <select name="author" class="form-select">
                <?php while ($author = $authors->fetch_object()) : ?>
                <option value="<?= $author->id ?>" <?php if ($album->author == $author->name) { echo 'selected'; } ?>><?= $author->name ?></option>
                <?php endwhile; ?>
              </select>
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="mb-3">
              <label for="title" class="form-label required">Título</label>
              <input type="text" name="title" value="<?= $album->title ?>" class="form-control">
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="mb-3">
              <label for="year" class="form-label required">Año</label>
              <input type="number" name="year" value="<?= $album->year ?>" class="form-control">
            </div>
          </div>
          <div class="col-12">
            <div class="mb-3">
              <label for="description" class="form-label">Descripción</label>
              <textarea name="description" class="form-control"><?= $album->description ?></textarea>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="mb-3">
              <label for="price" class="form-label required">Precio</label>
              <input type="number" name="price" value="<?= $album->price ?>" class="form-control">
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="mb-3">
              <label for="stock" class="form-label required">Stock</label>
              <input type="number" name="stock" value="<?= $album->stock ?>" class="form-control">
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="mb-3">
              <label for="status" class="form-label required">Estado</label>
              <select name="status" class="form-select">
                <option value="nuevo" <?php if ($album->status == "nuevo") { echo 'selected'; } ?>>Nuevo</option>
                <option value="usado" <?php if ($album->status == "usado") { echo 'selected'; } ?>>Usado</option>
              </select>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="mb-3">
              <label for="length" class="form-label required">Canciones (cant.)</label>
              <input type="number" name="length" value="<?= $album->length ?>" class="form-control">
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="mb-3">
              <label for="cover" class="form-label">Carátula</label>
              <input type="file" name="cover" accept="image/jpeg, image/jpg, image/png" class="form-control">
            </div>
          </div>
          <div class="col-12 col-md-4">
            <label for="spotify" class="form-label">Playlist en Spotify</label>
            <div class="input-group mb-2">
              <span class="input-group-text">
                <i class="fab fa-spotify"></i>
              </span>
              <input type="text" name="spotify" value="<?= $album->spotify ?>" class="form-control">
            </div>
            <a href="https://open.spotify.com/search" target="_blank">Buscar en Spotify</a>
          </div>
          <div class="col-12 col-md-4">
            <label for="youtube" class="form-label">Video de YouTube</label>
            <div class="input-group mb-2">
              <span class="input-group-text">
                <i class="fab fa-youtube"></i>
              </span>
              <input type="text" name="youtube" value="<?= $album->youtube ?>" class="form-control">
            </div>
            <a href="https://www.youtube.com/results" target="_blank">Buscar en YouTube</a>
          </div>
          <div class="col-12">
            <div class="float-start">
              <span class="required">: campo obligatorio</span>
            </div>
            <button type="submit" class="btn btn-primary float-end">Editar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
