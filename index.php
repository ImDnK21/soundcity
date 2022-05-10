<?php
session_start();
ob_start();
require_once('autoload.php');
require_once('config/database.php');
require_once('config/settings.php');
require_once('helpers/utils.php');
require_once('views/layout/start.php');
require_once('views/layout/navbar.php');

echo '<main>';

if (isset($_GET['controller'])) {
  $controllerName = ucwords($_GET['controller']) . 'Controller';
} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
  $controllerName = CONTROLLER_DEFAULT;
} else {
  Utils::showError();
  exit();
}

if (class_exists($controllerName)) {
  $controller = new $controllerName();
  if (isset($_GET['action']) && method_exists($controller, $_GET['action'])) {
    $action = $_GET['action'];
    $controller->$action();
  } elseif (isset($_GET['controller']) && empty($_GET['action'])) {
    $action = ACTION_DEFAULT;
    if (method_exists($controller, $action)) {
      $controller->$action();
    } else {
      Utils::showError();
    }
  } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
    $actionDefault = ACTION_DEFAULT;
    $controller->$actionDefault();
  } else {
    Utils::showError();
  }
} else {
  Utils::showError();
}

echo '</main>';
require_once('views/layout/footer.php');
require_once('views/layout/end.php');
ob_flush(); // Para asegurarnos que se envíe toda la información
?>
