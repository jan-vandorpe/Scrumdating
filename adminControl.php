<?php

require_once 'library\vendor\autoload.php';
require_once 'service\UserService.php';
require_once 'service\EventService.php';
require_once 'service\VenueService.php';

//initialize twig environment
$loader = new Twig_Loader_Filesystem('presentation');
$twig = new Twig_Environment($loader);

//"create new" form pages
if (isset($_GET['new'])) {
  //new event form
  if ($_GET['new'] = 'event') {
    $eventSvc = new EventService();
    $venueSvc = new VenueService();
    $eventTypeList = $eventSvc->getEventTypeList();
    $venueList = $venueSvc->getVenueList();
    
    //prepare twig page
    $view = $twig->render('newEvent.twig',array('eventTypeList' => $eventTypeList,'venueList'=>$venueList));
  }
  //new user form
  if ($_get['new'] = 'user'){
    //prepare twig page
    $view = $twig->render('newUser.twig');
  }
  //execute twig page
  print($view);
  exit(0);
}

//user management
if (isset($_GET['user'])) {
  $userSvc = new UserService();
  $user = $userSvc->getUserByID($_GET['user']);

//prepare twig page
  $view = $twig->render('profielDetail.twig', array('user' => $user));

  //execute twig page
  print($view);
  exit(0);
}

//user toevoegen
if(isset($_POST["addUser"])){
  
  $oneNight=0;
  $longTerm=0;
  $friends=0;
    
  $username=$_POST['username'];
  $password=$_POST['password'];
  $email=$_POST['email'];
  $sex=$_POST['sex'];
  $birthDate=$_POST['birthDate'];
  $preference=$_POST['preference'];
  $hairColor=$_POST['hairColor'];
  $length=$_POST['length'];
  $build=$_POST['build'];
  $eyeColor=$_POST['eyeColor'];  
  if(!isset($_POST['oneNight'])){$oneNight = 0;}else{$oneNight=$_POST['oneNight'];}
  if(!isset($_POST['longTerm'])){$longTerm = 0;}else{$longTerm=$_POST['longTerm'];}
  if(!isset($_POST['friends'])){$friends = 0;}else{$friends=$_POST['friends'];}
  $bio=$_POST['bio'];
  $region=$_POST['region'];
  $postcode=$_POST['postcode'];
  $occupation=$_POST['occupation'];
  $smoker=$_POST['smoker'];
  $admin=0;
  
  $userSvc = new UserService();
  $userSvc->addUser($username, $password, $email, $sex, $birthDate, $preference, $hairColor, $length, $build, $eyeColor, $oneNight, $longTerm, $friends, $bio, $region, $postcode, $occupation, $smoker, $admin);
  include_once 'showAllAttributes.php';
  exit(0);
}
//user verwijderen
if(isset($_GET["deleteUser"])){
  $userID = $_GET["deleteUser"];
  $userSvc = new UserService();
  $userSvc->deleteUser($userID);
  include_once 'showAllAttributes.php';
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
