<?php
require_once('models/album.php');
require_once('models/author.php');

class homeController {
  public function index() {
    $album = new Album();
    $albums = $album->getLatest(4);
    require_once('views/home/index.php');
  }

  // public function search() {
  //   require_once('views/home/catalogue.php' . $_GET['search']);
  // }
}
