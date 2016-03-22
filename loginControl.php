<?php

require_once 'library\vendor\autoload.php';
require_once 'service\UserService.php';

//initialize twig environment
$loader = new Twig_Loader_Filesystem('presentation');
$twig = new Twig_Environment($loader);

session_start();

if(isset($_SESSION["login"])){
  $login = $_SESSION["login"];
} else {
  $login = false;
}

if (isset($_GET['new'])) {
  $new = $_GET['new'];

  //new user form
  if ($new = 'user') {
    //prepare twig page
    $view = $twig->render('newUser.twig', array('target' => "loginControl.php"));
  }

  //execute twig page
  print($view);
  exit(0);
}

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $userSvc = new UserService();
  $loginCheck = $userSvc->checkLogin($username, $password);

  if ($loginCheck == false) {
    include_once 'presentation/loginPage.twig';
    exit(0);
  }
  else {
    $_SESSION["login"] =  $loginCheck;
    $login = $loginCheck;
    $view = $twig->render('userProfilePage.twig', array('login' => $login));
  }
  print($view);
  exit(0);
}

if (isset($_POST['registreer'])) {
  include_once 'presentation/registreerPage.twig';
}

if (isset($_POST['registreren'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];

  $userSvc = new UserService();
  $user = $userSvc->addUser($username, $password, $email, $sex, $birthDate, $preference, $hairColor, $length, $build, $eyeColor, $oneNight, $longTerm, $friends, $bio, $region, $postcode, $occupation, $smoker, $admin);
  include_once 'newUser.twig';
}
if (isset($_GET['profile'])) {
  $userSvc = new UserService();
  $user = $userSvc->getUserByID($_GET['profile']);
  $view = $twig->render('userProfilePage.twig', array('login' => $login));

  print($view);
  exit(0);
}