<?php
require_once 'library\vendor\autoload.php';
require_once 'service\UserService.php';
require_once 'service\EventService.php';
require_once 'service\EventLineService.php';

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
if (isset($_GET["profile"])) {
  $userSvc = new UserService();
  $user = $userSvc->getUserByID($_GET["profile"]);
  $userID = $_GET["profile"];
   
  $eventSvc = new EventService();
  $eventLineSrvc = new EventLineService();
    
  $lijst = $eventLineSrvc->IngeschrevenByID($userID);
  $eventList = $eventSvc->getEventList();
    
  $Result = array();
  foreach ($lijst as $rij) {
        
    $event = $eventSvc->getEventByID($rij["evntID"]);
    array_push($Result, $event);
  }
    
    $view = $twig->render('userProfilePage.twig', array('login' => $login, 'user' => $login, 'eventLijst' =>$Result, 'upcoming'=>$eventList));
    print($view);
    exit(0);   
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
    $_SESSION["login"] = $loginCheck;
    $login = $loginCheck;
    $userID = $login->getUserID();
    
    $eventSvc = new EventService();
  $eventLineSrvc = new EventLineService();
    
  $lijst = $eventLineSrvc->IngeschrevenByID($userID);
  $eventList = $eventSvc->getEventList();
    
  $Result = array();
  foreach ($lijst as $rij) {
        
    $event = $eventSvc->getEventByID($rij["evntID"]);
    array_push($Result, $event);
  }
    
    $view = $twig->render('userProfilePage.twig', array('login' => $login, 'user' => $login, 'eventLijst' =>$Result, 'upcoming'=>$eventList));
    print($view);
    exit(0);   
  }
}
 

if (isset($_POST['registreer'])) {
  include_once 'presentation/registreerPage.twig';
}

if (isset($_POST['registreren'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];

  $userSvc = new UserService();
  $user = $userSvc->registreerUser($username, $password, $email);
  $userID = $user->getUserID();
  $view = $twig->render('newUser.twig', array('user' => $user, 'target' => "loginControl.php?userID=$userID"));
  print($view);
  exit(0);
}

if (isset($_POST["addUser"])) {
  $userID = $_GET["userID"];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  if (!isset($_POST['sex'])) {
    $sex = "m";
  }
  else {
    $sex = $_POST['sex'];
  }
  $birthDate = $_POST['birthDate'];
  if (!isset($_POST['preference'])) {
    $preference = "a";
  }
  else {
    $preference = $_POST['preference'];
  }
  $hairColor = $_POST['hairColor'];
  $length = $_POST['length'];
  $build = $_POST['build'];
  $eyeColor = $_POST['eyeColor'];
  if (!isset($_POST['oneNight'])) {
    $oneNight = 0;
  }
  else {
    $oneNight = $_POST['oneNight'];
  }
  if (!isset($_POST['longTerm'])) {
    $longTerm = 0;
  }
  else {
    $longTerm = $_POST['longTerm'];
  }
  if (!isset($_POST['friends'])) {
    $friends = 0;
  }
  else {
    $friends = $_POST['friends'];
  }
  $bio = $_POST['bio'];
  $region = $_POST['region'];
  $postcode = $_POST['postcode'];
  $occupation = $_POST['occupation'];
  if (!isset($_POST['smoker'])) {
    $smoker = 0;
  }
  else {
    $smoker = $_POST['smoker'];
  }

  $userSvc = new UserService();
  $user = $userSvc->updateUser($userID, $username, $password, $email, $sex, $birthDate, $preference, $hairColor, $length, $build, $eyeColor, $oneNight, $longTerm, $friends, $bio, $region, $postcode, $occupation, $smoker);
  $_SESSION['login'] = $user;
  $view = $twig->render('userProfilePage.twig', array('login' => $user));
  print($view);
  exit(0);
}

if (isset($_GET['wijzig'])) {
  $userSvc = new UserService();
  $id = $login->getUserID();
  $user = $userSvc->getUserByID($id);

//prepare twig page
  $view = $twig->render('userDetail.twig', array('user' => $user, 'login' => $login,'target'=>"loginControl.php"));

  //execute twig page
  print($view);
  exit(0);
}

//user aanpassen
if (isset($_POST["updateUser"])) {
  $userID = $_POST["userID"];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $sex = $_POST['sex'];
  $birthDate = $_POST['birthDate'];
  $preference = $_POST['preference'];
  $hairColor = $_POST['hairColor'];
  $length = $_POST['length'];
  $build = $_POST['build'];
  $eyeColor = $_POST['eyeColor'];
  if (!isset($_POST['oneNight'])) {
    $oneNight = 0;
  }
  else {
    $oneNight = $_POST['oneNight'];
  }
  if (!isset($_POST['longTerm'])) {
    $longTerm = 0;
  }
  else {
    $longTerm = $_POST['longTerm'];
  }
  if (!isset($_POST['friends'])) {
    $friends = 0;
  }
  else {
    $friends = $_POST['friends'];
  }
  $bio = $_POST['bio'];
  $region = $_POST['region'];
  $postcode = $_POST['postcode'];
  $occupation = $_POST['occupation'];
  $smoker = $_POST['smoker'];
  $admin = $_POST['admin'];

  $userSvc = new UserService();
  $userSvc->updateUser($userID, $username, $password, $email, $sex, $birthDate, $preference, $hairColor, $length, $build, $eyeColor, $oneNight, $longTerm, $friends, $bio, $region, $postcode, $occupation, $smoker, $admin);
  $user = $userSvc->getUserByID($userID);
  $view = $twig->render('userProfilePage.twig', array('login' => $login,'user'=>$user));
  print($view);
  exit(0);
}
