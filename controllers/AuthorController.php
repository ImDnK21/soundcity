<?php 
require_once('models/author.php');

class authorController {
  public function index() {
    require_once('views/authors/index.php');
    Utils::title('Artistas');
  }

  public function add() {
    Utils::isAdmin();
    require_once('views/authors/add.php');
    Utils::title('Agregar artista');
  }
  
  public function save() {
    Utils::isAdmin();
    if (isset($_POST)) {
      $name = isset($_POST['name']) ? trim(ucwords($_POST['name'])) : false;
      
      if ($name) {
        $author = new Author();
        $author->setName($name);

        if ($author->save()) {
          $_SESSION['author'] = 'complete';
        } else {
          $_SESSION['author'] = 'failed';
        }
      }
    }
    header('Location: ' . APP_URL . 'admin/manageAuthors');
  }
}
