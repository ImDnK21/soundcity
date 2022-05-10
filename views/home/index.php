<div class="container py-3 animate__animated animate__fadeInUp d-none d-md-block">
  <div class="text-center">
    <h3 class="section-header">Productos destacados</h3>
    <div id="carousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
        <button type="button" data-bs-target="#carousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#carousel" data-bs-slide-to="2"></button>
        <button type="button" data-bs-target="#carousel" data-bs-slide-to="3"></button>
        <button type="button" data-bs-target="#carousel" data-bs-slide-to="4"></button>
        <button type="button" data-bs-target="#carousel" data-bs-slide-to="5"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="<?= APP_URL . 'uploads/slides/abbey-road.jpg' ?>" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="<?= APP_URL . 'uploads/slides/exile-on-main-street.jpg' ?>" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="<?= APP_URL . 'uploads/slides/nevermind.jpg' ?>" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="<?= APP_URL . 'uploads/slides/ride-the-lightning.jpg' ?>" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="<?= APP_URL . 'uploads/slides/the-dark-side-of-the-moon.jpg' ?>" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="<?= APP_URL . 'uploads/slides/the-marshall-mathers-lp.jpg' ?>" class="d-block w-100">
        </div>
      </div>
      <button type="button" data-bs-target="#carousel" data-bs-slide="prev" class="carousel-control-prev">
        <span aria-hidden="true" class="carousel-control-prev-icon"></span>
        <span class="visually-hidden">Anterior</span>
      </button>
      <button type="button" data-bs-target="#carousel" data-bs-slide="next" class="carousel-control-next">
        <span aria-hidden="true" class="carousel-control-next-icon"></span>
        <span class="visually-hidden">Siguiente</span>
      </button>
    </div>
  </div>
</div>
<div class="container py-3 animate__animated animate__fadeInUp">
  <div class="text-center">
    <h3 class="section-header">Nuevos productos</h3>
    <div class="row">
      <?php while($album = $albums->fetch_object()):  ?>
      <div class="col-6 col-md-3 pt-3">
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
<div id="contact" class="container py-3 animate__animated animate__fadeInUp">
  <h3 class="section-header">Contáctanos</h3>
  <div class="row pt-3">
    <div class="col-12 mb-3">
      <div class="row justify-content-center">
        <div class="col-12 col-md-4">
          <h5 class="fw-bold">Servicio al cliente</h5>
          <div class="d-flex align-items-center mb-2">
            <i class="fas fa-phone-alt icon me-2"></i>
            +569 12345678
          </div>
          <div class="d-flex align-items-center mb-2">
            <i class="fas fa-envelope icon me-2"></i>
            contacto@soundcity.cl
          </div>
        </div>
        <div class="col-12 col-md-4">
          <p class="fw-bold mb-1">Horario de atención</p>
          <p>Lunes a domingo de 08:00 a 16:00 horas</p>
        </div>
      </div>
    </div>

    <div class="col-12 col-lg-6">
      <iframe src="https://maps.google.com/maps?q=Inacap%20Santiago%20Sur&t=&z=17&ie=UTF8&iwloc=&output=embed" width="100%" height="500" loading="lazy"></iframe>
    </div>
    
    <div class="col-12 col-lg-6 py-3">
      <p class="mb-0"><span class="fw-bold">Nuestra tienda</span> está ubicada en:</p>
      <p>Av. Escuela Agrícola, Macul, Región Metropolitana</p>
      <p class="fw-bold mb-0">Horario:</p>
      <p>Lunes a viernes de 10:00 a 18:00 horas.</p>
      <div class="d-flex align-middle align-items-center justify-content-start">
        <div class="badge rounded-pill me-2">
          <a href="https://www.facebook.com">
            <i class="fa-brands fa-facebook icon me-2"></i>
          </a>
          <a href="https://www.instagram.com">
            <i class="fa-brands fa-instagram icon me-2"></i>
          </a>
          <a href="https://www.twitter.com">
            <i class="fa-brands fa-twitter icon"></i>
          </a>
        </div>
        <p class="fw-bold mb-1">@soundcity</p>
      </div>
    </div>
  </div>
</div>
