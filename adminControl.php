<?php

require_once 'library\vendor\autoload.php';
require_once 'service\UserService.php';
require_once 'service\EventService.php';
require_once 'service\VenueService.php';

//initialize twig environment
$loader = new Twig_Loader_Filesystem('presentation');
$twig = new Twig_Environment($loader);

//profile management
if (isset($_GET['user'])) {
  $userSvc = new UserService();
  $user = $userSvc->getUserByID($_GET['user']);

//prepare twig page
  $view = $twig->render('profielDetail.twig', array('user' => $user));
}

//event management
if(isset($_GET['event'])) {
  $eventSvc = new EventService();
  $event = $eventSvc->getEventByID($_GET['event']);

  //prepare twig page
  $view = $twig->render('eventDetail.twig', array('event' => $event));
}

//venue management
if(isset($_GET['venue'])){
  $venueSvc = new VenueService();
  $venue=$venueSvc->getVenueByID($_GET['venue']);
  
  //prepare twig page
  $view = $twig->render('venueDetail.twig', array('venue' => $venue));
}

//event type management
if(isset($_GET['eventtype'])){
  $eventTypeSvc = new EventType();
  $eventType = $eventTypeSvc->getEventTypeByID();
  
  //prepare twig page
  $view = $twig->render('eventTypeDetail.twig', array('eventType' => $eventType));
}

//execute twig page
print($view);
