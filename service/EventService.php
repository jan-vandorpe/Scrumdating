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
  
  public function addEvent() {
      
    $_POST["evntDate"] = $evDate;
    $_POST["evntName"] = $evName; 
    $_POST["venueID"] = $venID;  
      
    $eventDAO = new EventDAO();
    $eventDAO = $eventDAO->toevoegenEvent($evDate,$evName,$venID);
    return $eventDAO;
  }
}

