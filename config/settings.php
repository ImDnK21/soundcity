<?php
define('APP_LOCALE', 'es_ES');
define('APP_NAME', 'Sound City');
define('APP_REGION', 'es_CL');
define('APP_TIMEZONE', 'America/Santiago');
define('APP_URL', 'https://soundcity.rf.gd/');
define('ACTION_DEFAULT', 'index');
define('CONTROLLER_DEFAULT', 'HomeController');
define('OFFLINE', false);

ini_set('date.timezone', APP_TIMEZONE);
setlocale(LC_ALL, APP_LOCALE);
setlocale(LC_MONETARY, APP_REGION);

// Hide errors
// ini_set('display_errors', 0);
// ini_set('display_startup_errors', 0);
// error_reporting(0);
