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
  //zet alle variabelen klaar in de presentatie pagina
  $view = $twig->render('index.twig', array('login' => $login));

//toon de pagina
  print($view);
  exit(0);
}
$userSex = $login->getSex();
$userPreference = $login->getPreference();

$userSvc = new UserService();

if($userSex == 'm'){
  if($userPreference == 'm'){
    $matchSex = 'm';
    $matchPreference = 'm';
  }
  if($userPreference == 'f'){
    $matchSex = 'f';
    $matchPreference = 'm';
  }
  if($userPreference == 'a'){
    $matchSex = null;
    $matchPreference = 'a';
  }
} else {
  if($userPreference == 'm'){
    $matchSex = 'm';
    $matchPreference = 'f';
  }
  if($userPreference == 'f'){
    $matchSex = 'f';
    $matchPreference = 'f';
  }
  if($userPreference == 'a'){
    $matchSex = null;
    $matchPreference = 'a';
  }
}

$matches=$userSvc->getUsersBySexuality($matchSex, $matchPreference);

$view = $twig->render('matchen.twig',array('matches'=>$matches,'login'=>$login));
print($view);



