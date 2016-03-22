<?php

require_once 'library\vendor\autoload.php';
require_once 'service\UserService.php';

//initialize twig environment
$loader = new Twig_Loader_Filesystem('presentation');
$twig = new Twig_Environment($loader);

if (isset($_GET['new'])) {
$new = $_GET['new'];

 //new user form
  if ($new = 'user') {
    //prepare twig page
    $view = $twig->render('newUser.twig', array('target'=>"loginControl.php"));
  }
  
  //execute twig page
  print($view);
  exit(0);
}

if(isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $userSvc = new UserService();
  $user = $userSvc->checkLogin($username, $password);
  
  if($user == false){
      include_once 'presentation/loginPage.twig';
      exit(0);
  }
  else{
      $_SESSION["user"] = $user;
      $view = $twig->render('userProfilePage.twig',array('user'=>$user));
  } 
  print($view);
  exit(0);
}

if(isset($_POST['registreer'])){
    include_once 'presentation/registreerPage.twig';
}

if(isset($_POST['registreren'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    
    $userSvc = new UserService();
    $user = $userSvc->addUser($username, $password, $email, $sex, $birthDate, $preference, $hairColor, $length, $build, $eyeColor, $oneNight, $longTerm, $friends, $bio, $region, $postcode, $occupation, $smoker, $admin);
    include_once 'newUser.twig';
}