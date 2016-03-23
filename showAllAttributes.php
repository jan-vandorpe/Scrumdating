<?php
//showAllAttributes.php
require_once 'service\UserService.php';
require_once 'service\EventService.php';
require_once 'service\VenueService.php';
require_once 'library\vendor\autoload.php';

session_start();

//get all users
$userSvc = new UserService();
$userList = $userSvc->getUserList();

//get all events and types
$eventSvc = new EventService();
$eventList = $eventSvc->getEventList();
$eventTypeList = $eventSvc->getEventTypeList();

//get all venues
$venueSvc = new VenueService();
$venueList = $venueSvc->getVenueList();

//check admin login
if(isset($_SESSION['login'])){  //Gebruiker al ingelogd?
  $admin = $_SESSION['login']->getAdmin();
  if($admin = 1){
  $login = $_SESSION['login'];
  } else {$login = false;}
} else {
  $login = false;
}

//initialize twig environment
$loader = new Twig_Loader_Filesystem('presentation');
$twig = new Twig_Environment($loader);

//execute twig page
if($login!=false){
$view = $twig->render('attributen.twig', array('userList' => $userList, 'eventList' => $eventList,'eventTypeList' => $eventTypeList,'venueList' => $venueList,'login'=>$login));
} else {
  $view = $twig->render('index.twig', array('login' => $login));
}
print($view);

