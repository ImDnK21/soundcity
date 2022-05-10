<?php
class Utils {
  // Verificar que el usuario esté autentificado
  public static function isAuth() {
    if (!isset($_SESSION['logged'])) {
      header('Location: ' . APP_URL . 'account/login');
    } else {
      return true;
    }
  }

  // Verificar si el usuario tiene el rol de administrador
  public static function isAdmin() {
    if (!isset($_SESSION['admin'])) {
      header('Location: ' . APP_URL);
    } else {
      return true;
    }
  }

  // Administrar estadísticas del carrito (cantidad de productos, total de productos y precio total)
  public static function cartStats() {
    $stats = array(
      'count' => 0,
      'items' => 0,
      'total' => 0
    );

    if (isset($_SESSION['cart'])) {
      $stats['count'] = count($_SESSION['cart']);
      foreach($_SESSION['cart'] as $product) {
        $stats['items'] += $product['amount'];
        $stats['total'] += $product['price'] * $product['amount'];
      }
    }
    return $stats;
  }

  // Limpiar string de caracteres extraños
  public static function clearString($string) {
    $remove = ["'","!",";","•",",","\\","}","{","[","]"];
    $replace_with = [];
    return str_replace($remove, $replace_with, $string);
  }

  // Sanitizar string
  public static function sanitize($string) {
    $string = trim($string);
    $string = strip_tags($string);
    $string = htmlspecialchars($string, ENT_QUOTES);
    return $string;
  }

  // Obtener el valor máximo una columna de una tabla
  public static function max($table, $column) {
    $db = Database::connect();
    $query = "SELECT MAX($column) AS max FROM $table";
    $max = $db->query($query)->fetch_object()->max;
    return $max;
  }

  // Obtener el valor mínimo una columna de una tabla
  public static function min($table, $column) {
    $db = Database::connect();
    $query = "SELECT MIN($column) AS min FROM $table";
    $min = $db->query($query)->fetch_object()->min;
    return $min;
  }

  // Obtener el valor pasado por parámetro POST (por si se produce un error, evitar tener que llenar el formulario nuevamente)
  public static function old($field) {
    if (isset($_POST[$field])) {
      return $_POST[$field];
    }
  }

  // Ejecutar una consulta SQL pasándole una tabla, columna y filtro y valor opcionales
  public static function query($table, $column, $filter = '', $value = '') {
    $db = Database::connect();
    $query = "SELECT $column FROM $table WHERE $filter = $value";
    $result = $db->query($query)->fetch_object()->$column;
    return $result;
  }

  // Verificar si la URL actual contiene cierto texto
  public static function routeIs($route) {
    $url = $_SERVER['REQUEST_URI'];
    if (strpos($url, $route) !== false) { return true; } else { return false; }
  }

  // Mostrar error por defecto (#404)
  public static function showError() {
    $error = new errorController();
    $error->notfound();
  }

  // Definir el título de la página mediante un script
  public static function title($title) {
    echo '<script>document.title = "' . $title . ' | ' . APP_NAME .'"</script>';
  }

  // Formatear números a pesos chilenos
  public static function toCLP($number){
    $number = (string)$number;
    $tmp = "";
    $pos = 1;
    for($i=strlen($number)-1; $i>=0; $i--){
      $tmp = $tmp.substr($number, $i, 1);
      if ($pos%3==0 && $pos != strlen($number))
      $tmp = $tmp . ".";
      $pos = $pos + 1;
    }
    $formatted = "$".strrev($tmp);
    return $formatted;
  }
}
