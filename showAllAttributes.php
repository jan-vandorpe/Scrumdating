<?php
//showAllAttributes.php
require_once 'service\UserService.php';
require_once 'service\EventService.php';
require_once 'service\VenueService.php';
require_once 'library\vendor\autoload.php';

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

//initialize twig environment
$loader = new Twig_Loader_Filesystem('presentation');
$twig = new Twig_Environment($loader);

//execute twig page
$view = $twig->render('attributen.twig', array('userList' => $userList, 'eventList' => $eventList,'eventTypeList' => $eventTypeList,'venueList' => $venueList));
print($view);

