<?php
class errorController {
  public function forbidden() {
    require_once('views/error/403.php');
  }

  public function notfound() {
    require_once('views/error/404.php');
  }
}
