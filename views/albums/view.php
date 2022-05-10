<div class="container-fluid album-categories">
  <ul>
    <li><a href="">Categorías</a></li>
    <li><a href="">Artistas</a></li>
    <li><a href="">Ofertas</a></li>
    <li><a href="">Nuevos</a></li>
  </ul>
</div>
<?php if (isset($album)): ?>
  <div class="container-fluid py-3">
  <div class="row justify-content-center">
    <div class="col-12 col-md-3 mb-3">
      <img src="<?= APP_URL . 'uploads/covers/' . $album->cover_path ?>" class="album-cover img-fluid">
      <div>
        <ul class="list-group album-specs">
          <li class="list-group-item">
            Estado: <b><?= $album->status ?></b>
          </li>
          <li class="list-group-item">
            Año de publicación: <b><?= $album->year ?></b>
          </li>
          <li class="list-group-item">
            Número de canciones: <b><?= $album->length ?></b>
          </li>
        </ul>
      </div>
    </div>
    <div class="col-12 col-md-4 mb-3">
      <a class="album-type">Discos</a>
      <a class="album-title"><?= $album->author . ' - ' . $album->title ?></a>
      <a class="album-author mb-2"><?= $album->author ?></a>
      <p class="album-id mb-2"><?= 'Código: #' . $album->id ?></p>
      <!-- Sistema de valoración, aun no programado -->
      <p class="album-price mb-3"><?= Utils::toCLP($album->price) ?></p>
      <a href="<?= APP_URL . 'cart/add?id=' . $album->id ?>" class="btn btn-primary mb-3 me-2">
        <i class="fas fa-shopping-cart me-2"></i>
        Agregar al carro
      </a>
      <?php if (!empty($album->spotify)): ?>
      <button id="toggle-spotify" class="btn btn-success mb-3 sp">
        <i class="fab fa-spotify me-2"></i>
        Spotify
      </button>
      <?php endif; 
      if (!empty($album->youtube)): ?>
      <div class="ratio ratio-16x9">
        <div class="youtube">
          <iframe src="<?= 'https://www.youtube.com/embed/' . $album->youtube ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
      <?php endif; ?>
    </div>
    <?php if (!empty($album->spotify)): ?>
    <div id="spotify" class="col-12 col-md-3 mb-3 d-block">
      <iframe iframe src="<?= 'https://open.spotify.com/embed/album/' . $album->spotify . '?theme=1' ?>" width="100%" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" style="border-radius: 4px; <?= 'height: calc(80px + 31px *' . $album->length . ');' ?>"></iframe>
    </div>
    <?php endif; ?>
  </div>
</div>

<?php else: 
  Utils::showError();
endif; ?>
