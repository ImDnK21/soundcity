<?php 
require_once('models/album.php');
require_once('models/author.php');

class albumController {
  public function index() {
    if (isset($_GET['max'])) {
      $max = $_GET['max'];
      $min = Utils::min('album', 'price');
      $album = new Album();
      $albums = $album->getFiltered('price <= ' . $max);
      require_once('views/albums/index.php');
      echo '<script>document.getElementById("price-range").value = ' . $max . '; document.getElementById("price-label").innerHTML = "' . Utils::toCLP($min) . ' - ' . Utils::toCLP($max) . '";</script>';
    } elseif (isset($_GET['sort'])) {
      switch($_GET['sort']) {
        case 'price_asc':
          $sort = 'price ASC';
          break;
        case 'price_desc':
          $sort = 'price DESC';
          break;
        case 'name_asc':
          $sort = 'title ASC';
          break;
        case 'name_desc':
          $sort = 'title DESC';
          break;
      }
      
      $album = new Album();
      $albums = $album->getSortered($sort);
      require_once('views/albums/index.php');
    } elseif (isset($_GET['search'])) {
      $search = strtolower(Utils::sanitize($_GET['search']));
      $album = new Album();
      $albums = $album->getFiltered('title LIKE "%' . $search . '%" OR author.name LIKE "%' . $search . '%"');
      require_once('views/albums/index.php');
    } else {
      $album = new Album();
      $albums = $album->getAll();
      require_once('views/albums/index.php');
    }

    Utils::title('Catálogo');
  }

  public function view() {
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $album = new Album();
      $album->setId($id);
      $album = $album->getSingle();
      require_once('views/albums/view.php');
      Utils::title($album->author . ' - ' .$album->title);
    } else {
      Utils::showError();
    }
  }

  public function save() {
    Utils::isAdmin();
    if (isset($_POST)) {
      $author = isset($_POST['author']) ? trim($_POST['author']) : false;
      $title = isset($_POST['title']) ? trim(ucwords($_POST['title'])) : false;
      $year = isset($_POST['year']) ? trim($_POST['year']) : false;
      $description = isset($_POST['description']) ? trim($_POST['description']) : false;
      $price = isset($_POST['price']) ? trim($_POST['price']) : false;
      $stock = isset($_POST['stock']) ? trim($_POST['stock']) : false;
      $status = isset($_POST['status']) ? trim($_POST['status']) : false;
      $length = isset($_POST['length']) ? trim($_POST['length']) : false;
      $spotify = isset($_POST['spotify']) ? trim($_POST['spotify']) : false;
      $youtube = isset($_POST['youtube']) ? trim($_POST['youtube']) : false;
      
      if ($author && $title && $year && $price && $stock && $status && $length) {
        $album = new Album();
        $album->setAuthor(Utils::sanitize($author));
        $album->setTitle(Utils::sanitize($title));
        $album->setYear(Utils::sanitize($year));
        $album->setDescription(Utils::sanitize($description));
        $album->setPrice(Utils::sanitize($price));
        $album->setStock(Utils::sanitize($stock));
        $album->setStatus(Utils::sanitize($status));
        $album->setLength(Utils::sanitize($length));
        $album->setSpotify(Utils::sanitize($spotify));
        $album->setYoutube(Utils::sanitize($youtube));
        
        if (isset($_FILES['cover'])) {
          $file = $_FILES['cover'];
          $filename = $file['name'];
          $mimetype = $file['type'];

          if ($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png') {
            if (!is_dir('uploads/covers')) {
              mkdir('uploads/covers', 0777, true);
            }

            $authorName = Utils::query('author', 'name', 'id', $author);
            $filename = Utils::clearString(strtolower(str_replace(' ', '-', $authorName)) . '_' . strtolower(str_replace(' ', '-', $title)) . '.' . str_replace('image/', '', $mimetype));

            $cover = 'uploads/covers/' . $filename;
            move_uploaded_file($file['tmp_name'], $cover);
            $album->setCoverPath($filename);
          }
        }
        
        if ($album->save()) {
          $_SESSION['album'] = 'complete';
        } else {
          $_SESSION['album'] = 'failed';
        }
      } else {
        $_SESSION['album'] = 'failed';
      }
    }
    header('Location:' . APP_URL . 'admin/manageProducts');
  }
  
  public function update() {
    Utils::isAdmin();
    if (isset($_POST) && isset($_GET['id'])) {
      $author = isset($_POST['author']) ? trim($_POST['author']) : false;
      $title = isset($_POST['title']) ? trim(ucwords($_POST['title'])) : false;
      $year = isset($_POST['year']) ? trim($_POST['year']) : false;
      $description = isset($_POST['description']) ? trim($_POST['description']) : false;
      $price = isset($_POST['price']) ? trim($_POST['price']) : false;
      $stock = isset($_POST['stock']) ? trim($_POST['stock']) : false;
      $status = isset($_POST['status']) ? trim($_POST['status']) : false;
      $length = isset($_POST['length']) ? trim($_POST['length']) : false;
      $spotify = isset($_POST['spotify']) ? trim($_POST['spotify']) : false;
      $youtube = isset($_POST['youtube']) ? trim($_POST['youtube']) : false;
      
      if ($author && $title && $year && $price && $stock && $status && $length) {
        $album = new Album();
        $album->setAuthor(Utils::sanitize($author));
        $album->setTitle(Utils::sanitize($title));
        $album->setYear(Utils::sanitize($year));
        $album->setDescription(Utils::sanitize($description));
        $album->setPrice(Utils::sanitize($price));
        $album->setStock(Utils::sanitize($stock));
        $album->setStatus(Utils::sanitize($status));
        $album->setLength(Utils::sanitize($length));
        $album->setSpotify(Utils::sanitize($spotify));
        $album->setYoutube(Utils::sanitize($youtube));
        
        if (isset($_FILES['cover'])) {
          $file = $_FILES['cover'];
          $filename = $file['name'];
          $mimetype = $file['type'];

          if ($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png') {
            if (!is_dir('uploads/covers')) {
              mkdir('uploads/covers', 0777, true);
            }

            $authorName = Utils::query('author', 'name', 'id', $author);
            $filename = Utils::clearString(strtolower(str_replace(' ', '-', $authorName)) . '_' . strtolower(str_replace(' ', '-', $title)) . '.' . str_replace('image/', '', $mimetype));

            $cover = 'uploads/covers/' . $filename;
            move_uploaded_file($file['tmp_name'], $cover);
            $album->setCoverPath($filename);
          }
        }

        $id = $_GET['id'];
        $album->setId($id);
        
        if ($album->update()) {
          $_SESSION['album'] = 'complete';
        } else {
          $_SESSION['album'] = 'failed';
        }
      } else {
        $_SESSION['album'] = 'failed';
      }
    } else {
      die('No se recibieron parámetros suficientes.');
    }
    header('Location:' . APP_URL . 'admin/manageProducts');
  }
}
