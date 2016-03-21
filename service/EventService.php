<?php

//service/EventService.php
require_once 'data/EventDAO.php';

class EventService {

  public function getEventList() {
    $eventDAO = new EventDAO();
    $list = $eventDAO->getAll();
    return $list;
  }

  public function getEventByID($evntID) {
    $eventDAO = new EventDAO();
    $event = $eventDAO->getById($evntID);
    return $event;
  }

  public function deleteEvent($evntID) {
    $eventDAO = new EventDAO();
    $eventDAO->deleteEvent($evntID);
  }

  public function updateEvent($evID, $evDate, $evName, $venID) {
    $eventDAO = new EventDAO();
    $eventDAO->updateEvent($evID, $evDate, $evName, $venID);
  }

  public function addEvent($evDate, $evName, $venID) {
    $eventDAO = new EventDAO();
    $eventDAO = $eventDAO->addEvent($evDate, $evName, $venID);
    return $eventDAO;
  }

  public function getEventTypeList() {
    $eventDAO = new EventDAO();
    $list = $eventDAO->getAllEventTypes();
    return $list;
  }

  public function getEventTypeByID() {
    $eventDAO = new EventDAO();
    $eventType = $eventDAO->getEventTypeByID();
    return $eventType;
  }
  public function addEventType($evntName,$evntDescription,$evntPrice){
    $eventDAO = new EventDAO();
    $eventDAO->addEventType($evntName, $evntDescription, $evntPrice);
  }
  public function deleteEventType($evntName){
    $eventDAO = new EventDAO();
    $eventDAO->deleteEventType($evntName);
  }

}
