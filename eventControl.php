<?php

require_once 'library\vendor\autoload.php';
require_once 'service\EventLineService.php';
require_once 'service\EventService.php';
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

if(isset($_GET["action"])){
    
  $eventSvc = new EventService();
  $eventList = $eventSvc->getEventList();
  
  //prepare twig page
  $view = $twig->render('EventList.twig', array('eventList' => $eventList, 'login'=>$login));

  //execute twig page
  print($view);
  exit(0);
    
}

if(isset($_GET["userID"])&&isset($_GET["eventID"])){
    
    $userID = $_GET["userID"];
    $eventID = $_GET["eventID"];
    
    $eventLineSrvc = new EventLineService();
    $eventLineSrvc->Inschrijven($userID, $eventID);
    
    $view = $twig->render('userProfilePage.twig', array('login' => $login, 'user' => $login));
    print($view);
    exit(0);
    
    
}