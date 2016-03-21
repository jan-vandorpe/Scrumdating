<?php
//service/EventService.php
require_once 'data/EventDAO.php';

class EventService {
  public function getEventList(){
    $eventDAO = new EventDAO();
    $list = $eventDAO->getAll();
    return $list;
  }
  
  public function getEventByID($evntID){
    $eventDAO = new EventDAO();
    $event = $eventDAO->getById($evntID);
    return $event;
  }
  public function getEventTypeList(){
    $eventDAO = new EventDAO();
    $list = $eventDAO->getAllEventTypes();
    return $list;
  }
  public function getEventTypeByID(){
    $eventDAO = new EventDAO();
    $eventType = $eventDAO->getEventTypeByID();
    return $eventType;
  }
  public function deleteEvent($evntID){
    $eventDAO = new EventDAO();
    $eventDAO->deleteEvent($evntID);
  }
  
  public function addEvent($evDate,$evName,$venID) {
           
    $eventDAO = new EventDAO();
    $eventDAO = $eventDAO->addEvent($evDate,$evName,$venID);
    return $eventDAO;
  }
}

