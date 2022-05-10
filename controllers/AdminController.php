<?php 
require_once('models/album.php');
require_once('models/author.php');

class AdminController {
  public function index() {
    Utils::isAdmin();
    require_once('views/admin/index.php');
    Utils::title('Dashboard');
  }

  public function manageAuthors() {
    Utils::isAdmin();
    $author = new Author();
    $authors = $author->getSortered('id ASC');
    require_once('views/admin/authors/manage.php');
  }

  public function addAuthor() {
    Utils::isAdmin();
    require_once('views/admin/authors/add.php');
    Utils::title('Agregar artista');
  }

  public function deleteAuthor() {
    Utils::isAdmin();
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $author = new Author();
      $author->setId($id);
      if ($author->delete()) {
        $_SESSION['delete'] = 'complete';
      } else {
        $_SESSION['delete'] = 'failed';
      }
    }
    header('Location: ' . APP_URL . 'admin/manageAuthors');
  }

  public function manageProducts() {
    Utils::isAdmin();
    $album = new Album();
    $albums = $album->getAll();
    require_once('views/admin/albums/manage.php');
    Utils::title('Gestionar productos');
  }

  public function addProduct() {
    Utils::isAdmin();
    $author = new Author();
    $authors = $author->getAll();
    require_once('views/admin/albums/add.php');
    Utils::title('Agregar álbum');
  }

  public function editProduct() {
    Utils::isAdmin();
    if (isset($_GET['id']) && !empty($_GET['id'])) {
      $author = new Author();
      $authors = $author->getAll();
      $album = new Album();
      $album->setId($_GET['id']);
      $album = $album->getSingle();
      require_once('views/admin/albums/edit.php');
      Utils::title('Editar álbum');
    } else {
      header('Location: ' . APP_URL . 'admin/manageProducts');
    }
  }

  public function deleteProduct() {
    Utils::isAdmin();
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $album = new Album();
      $album->setId($id);
      if ($album->delete()) {
        $_SESSION['delete'] = 'complete';
      } else {
        $_SESSION['delete'] = 'failed';
      }
    }
    header('Location: ' . APP_URL . 'admin/manageProducts');
  }
}
