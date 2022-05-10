<?php
function controllerAutoload($classname) {
  include_once('controllers/' . $classname . '.php');
}

spl_autoload_register('controllerAutoload');
