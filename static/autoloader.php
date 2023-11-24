<?php
require_once "config.php";
require_once "db.php";
require_once "util.php";
global $authRequired;

session_start();

spl_autoload_register(function ($className) {
  $filePath = "../private/managers/$className.php";
  require_once $filePath;
});

if (hasActiveSession()) {
  extendSessionTimer();
}

if ($authRequired && !hasActiveSession()) {
  header("location: /");
  exit;
}
