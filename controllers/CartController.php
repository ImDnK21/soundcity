<?php
require_once('models/album.php');

class cartController {
  public function index() {
    $stats = Utils::cartStats();

    if (isset($_SESSION['cart']) && count($_SESSION['cart']) >= 1) {
      $cart = $_SESSION['cart'];
    } else {
      $cart = array();
    }
    require_once('views/cart/index.php');
  }

  public function add() {
    if (isset($_GET['id'])) {
      $albumID = $_GET['id'];
    } else {
      header('Location:' . APP_URL);
    }

    if (isset($_SESSION['cart'])) {
      $counter = 0;
      foreach($_SESSION['cart'] as $index => $value) {
        if ($value['id'] == $albumID) {
          $_SESSION['cart'][$index]['amount']++;
          $counter++;
        }
      }
    }

    if (!isset($counter) || $counter == 0) {
      $album = new Album();
      $album->setId($albumID);
      $album = $album->getSingle();

      if (is_object($album)) {
        $_SESSION['cart'][] = array(
          'id' => $album->id,
          'price' => $album->price,
          'amount' => 1,
          'product' => $album
        );
      }
    }
    header('Location:' . APP_URL . 'cart/index');
  }

  public function delete() {
    if (isset($_GET['index'])) {
      $index = $_GET['index'];
      unset($_SESSION['cart'][$index]);
    }
    header('Location:' . APP_URL . 'cart/index');
  }

  public function increase() {
    if (isset($_GET['index'])) {
      $index = $_GET['index'];
      $_SESSION['cart'][$index]['amount']++;
    }
    header('Location:' . APP_URL . '/cart/index');
  }

  public function decrease() {
    if (isset($_GET['index'])) {
      $index = $_GET['index'];
      $_SESSION['cart'][$index]['amount']--;

      if ($_SESSION['cart'][$index]['amount'] == 0) {
        unset($_SESSION['cart'][$index]);
      }
    }
    header('Location:' . APP_URL . '/cart/index');
  }

  public function clear() {
    unset($_SESSION['cart']);
    header('Location:' . APP_URL . '/cart/index');
  }
}
