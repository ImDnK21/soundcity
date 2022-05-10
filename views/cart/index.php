<div class="container py-3">
  <div class="d-flex align-items-center mb-3">
    <h1 class="me-2">Tu carrito</h1>
    <p><?= $stats['items'] . ' productos' ?></p>
  </div>
  <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) >= 1): ?>
  <div class="row justify-content-center">
    <div class="col-12 col-md-6">
      <?php 
      foreach($cart as $index => $value):
        $product = $value['product'];
      ?>
      <div class="row mb-4">
        <div class="col-4">
          <img src="<?= APP_URL . 'uploads/covers/' . $product->cover_path ?>" alt class="img-fluid border">
        </div>
        <div class="col-6">
          <p class="fw-bold mb-0">
            <?= $product->title ?>
          </p>
          <p class="mb-0">
            <?= $product->author ?>
          </p>
          <p class="mb-0">
            <?= 'Cantidad: ' . $value['amount'] ?>
          </p>
          <p class="mb-0">
            <?= 'Precio: ' . Utils::toCLP($value['price']) ?>
          </p>
        </div>
        <div class="col-2">
          <a href="<?= APP_URL . 'cart/delete?index=' . $index ?>">
            <i class="fas fa-times float-end me-2"></i>
          </a>
        </div>
      </div>
      <?php endforeach; ?>
      <a href="<?= APP_URL . 'album/index' ?>" class="btn btn-primary mb-3">Seguir comprando</a>
    </div>
    <div class="col-12 col-md-6">
      <p><?=  $stats['items'] . ' productos' ?></p>
      <div class="row">
        <div class="col-6">
          <p>Total productos</p>
        </div>
        <div class="col-6">
          <p><?= Utils::toCLP($stats['total']) ?></p>
        </div>
        <div class="col-12">
          <button class="btn btn-primary btn-block">Comprar</button>
        </div>
      </div>
    </div>
  </div>
  <?php else: ?>
  <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 50vh">
    <div class="d-block text-center">
      <p class="fs-5">Tu carro de compra está vacío</p>
    </div>
  </div>
  <?php endif; ?>
</div>
