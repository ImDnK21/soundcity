<div class="container-fluid album-categories d-none d-md-block">
  <ul>
    <li><a href="">Categorías</a></li>
    <li><a href="">Artistas</a></li>
    <li><a href="">Ofertas</a></li>
    <li><a href="">Nuevos</a></li>
  </ul>
</div>
<div class="container py-3">
  <div class="row justify-content-center">
    <div class="col-12 col-lg-3">
      <nav class="border-bottom mb-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Categorías</li>
        </ol>
      </nav>
      <div class="border-bottom mb-3">
        <label for="price-range" class="form-label">Precio máximo</label>
        <input type="range" id="price-range" name="price" <?php if (!isset($_GET['max'])) { echo 'value="' . Utils::max('album', 'price') .'"'; } ?> min="<?= Utils::min('album', 'price') ?>" max="<?= Utils::max('album', 'price') ?>" class="form-range">
        <p id="price-label">
          <?= Utils::toCLP(Utils::min('album', 'price')) . ' - ' . Utils::toCLP(Utils::max('album', 'price')) ?>
        </p>
      </div>
      <div class="mb-3">
        <div class="dropdown">
          <button type="button" id="categories" data-bs-toggle="dropdown" aria-expanded="false" class="btn btn-dark btn-block dropdown-toggle">
            Categorías
          </button>
          <ul class="dropdown-menu" aria-labelledby="categories">
            <li><a href="#" class="dropdown-item">Lorem ipsum</a></li>
            <li><a href="#" class="dropdown-item">Lorem ipsum</a></li>
            <li><a href="#" class="dropdown-item">Lorem ipsum</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-9">
      <div class="row">
        <div class="col">
          <h2 class="fw-bold">General</h2>
          <p>
            <?= 'Mostrando ' . $albums->num_rows . ' productos' ?>
          </p>
        </div>
        <div class="col">
          <div class="d-flex justify-content-end">
            <div class="dropdown">
              <button type="button" id="sort-by" data-bs-toggle="dropdown" aria-expanded="false" class="btn btn-dark dropdown-toggle">
                Ordenar por
              </button>
              <ul class="dropdown-menu" aria-labelledby="sort-by">
                <li><a href="<?= APP_URL . 'album/index?sort=price_asc' ?>" class="dropdown-item">Precio: más bajo primero</a></li>
                <li><a href="<?= APP_URL . 'album/index?sort=price_desc' ?>" class="dropdown-item">Precio: más alto primero</a></li>
                <li><a href="<?= APP_URL . 'album/index?sort=name_asc' ?>" class="dropdown-item">Nombre: A-Z</a></li>
                <li><a href="<?= APP_URL . 'album/index?sort=name_desc' ?>" class="dropdown-item">Nombre: Z-A</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-start">
        <?php while ($album = $albums->fetch_object()) : ?>
        <div class="col-4 col-md-3 py-3">
          <div class="disk-border">
            <div class="disk-container">
              <a href="<?= APP_URL . 'album/view?id=' . $album->id ?>" class="disk-link">
                <?php if(!empty($album->cover_path)): ?>
                <img src="<?= APP_URL . 'uploads/covers/' . $album->cover_path ?>" alt="<?= $album->title . ', ' . $album->author ?>" class="w-100 disk-cover">
                <?php else: ?>
                <img src="<?= APP_URL . 'assets/img/no-image.jpg' ?>" alt="Placeholder" class="w-100 disk-image">
                <?php endif; ?>
                <div class="text-center p-3">
                  <p class="disk-name fw-bold mb-0"><?= $album->title ?></p>
                  <p class="disk-author mb-0"><?= $album->author . ' - ' . Utils::toCLP($album->price) ?></p>
                </div>
              </a>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
</div>
