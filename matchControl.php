<?php
require_once 'library\vendor\autoload.php';
require_once 'service\UserService.php';

//initialize twig environment
$loader = new Twig_Loader_Filesystem('presentation');
$twig = new Twig_Environment($loader);

if (!isset($_SESSION)) {
  session_start();
}

if (isset($_SESSION["login"])) {
  $login = $_SESSION["login"];
}
else {
  $login = false;
}



