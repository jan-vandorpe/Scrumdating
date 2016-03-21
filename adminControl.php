<?php

require_once 'library\vendor\autoload.php';
require_once 'service\UserService.php';
require_once 'service\EventService.php';
require_once 'service\VenueService.php';

//initialize twig environment
$loader = new Twig_Loader_Filesystem('presentation');
$twig = new Twig_Environment($loader);

//create new
if (isset($_GET['new'])) {
  //new event
  if ($_GET['new'] = 'event') {
    $eventSvc = new EventService();
    $venueSvc = new VenueService();
    $eventTypeList = $eventSvc->getEventTypeList();
    $venueList = $venueSvc->getVenueList();
    
    //prepare twig page
    $view = $twig->render('newEvent.twig',array('eventTypeList' => $eventTypeList,'venueList'=>$venueList));
  }
  //execute twig page
  print($view);
  exit(0);
}

//profile management
if (isset($_GET['user'])) {
  $userSvc = new UserService();
  $user = $userSvc->getUserByID($_GET['user']);

//prepare twig page
  $view = $twig->render('profielDetail.twig', array('user' => $user));

  //execute twig page
  print($view);
  exit(0);
}

//event management
if (isset($_GET['event'])) {
  $eventSvc = new EventService();
  $event = $eventSvc->getEventByID($_GET['event']);
  $eventTypeList = $eventSvc->getEventTypeList();

  $venueSvc = new VenueService();
  $venueList = $venueSvc->getVenueList();

  //prepare twig page
  $view = $twig->render('eventDetail.twig', array('event' => $event, 'eventTypeList' => $eventTypeList, 'venueList' => $venueList));

  //execute twig page
  print($view);
  exit(0);
}

//event toevoegeen
if(isset($_POST["addEvent"])){
  $evDate = $_POST["evntDate"];
  $evName = $_POST["evntName"]; 
  $venID = $_POST["venueID"];  
  $eventSvc = new EventService();
  $eventSvc->addEvent($evDate,$evName,$venID);
  include_once 'showAllAttributes.php';
  exit(0);
}

//event verwijderen
if(isset($_GET["deleteEvent"])){
  $evID = $_GET["deleteEvent"];
  $eventSvc = new EventService();
  $eventSvc->deleteEvent($evID);
  include_once 'showAllAttributes.php';
  exit(0);
}

//event aanpassen
if(isset($_POST["updateEvent"])){
  $evID = $_POST["evntID"];
  $evDate = $_POST["evntDate"];
  $evName = $_POST["evntName"]; 
  $venID = $_POST["venueID"];
  $eventSvc = new EventService();
  $eventSvc->updateEvent($evID,$evDate,$evName,$venID);
  include_once 'showAllAttributes.php';
  exit(0);
}

//user verwijderen
if(isset($_GET["deleteUser"])){
  $userID = $_GET["deleteUser"];
  $eventSvc = new EventService();
  $eventSvc->deleteEvent($userID);
  include_once 'showAllAttributes.php';
  exit(0);
}

//user aanpassen
if(isset($_POST["updateUser"])){
  $evID = $_POST["userID"];
  $evDate = $_POST["evntDate"];
  $evName = $_POST["evntName"]; 
  $venID = $_POST["venueID"];
  $eventSvc = new EventService();
  $eventSvc->updateEvent($evID,$evDate,$evName,$venID);
  include_once 'showAllAttributes.php';
  exit(0);
}

//venue management
if (isset($_GET['venue'])) {
  $venueSvc = new VenueService();
  $venue = $venueSvc->getVenueByID($_GET['venue']);

  //prepare twig page
  $view = $twig->render('venueDetail.twig', array('venue' => $venue));

  //execute twig page
  print($view);
  exit(0);
}

//event type management
if (isset($_GET['eventtype'])) {
  $eventTypeSvc = new EventType();
  $eventType = $eventTypeSvc->getEventTypeByID();

  //prepare twig page
  $view = $twig->render('eventTypeDetail.twig', array('eventType' => $eventType));

  //execute twig page
  print($view);
  exit(0);
}
