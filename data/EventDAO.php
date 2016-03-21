<?php

require_once 'DBConfig.php';
require_once 'entities/Event.php';
require_once 'entities/EventType.php';
require_once 'entities/Venue.php';

class EventDAO {

  public function getAll() {
    $sql = "SELECT * FROM events, eventtypes, venues WHERE events.evntName = eventtypes.evntName AND events.venueID = venues.venueID ORDER BY evntID ASC";
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $resultset = $dbh->query($sql);
    $lijst = array();
    foreach ($resultset as $rij) {
      $venue = new Venue($rij["venueID"], $rij["venueName"], $rij["venueCity"], $rij["venueStreet"], $rij["venueStreetNR"], $rij["venueCapacity"]);
      $eventtype = new EventType($rij["evntName"], $rij["evntDescription"], $rij["evntPrice"]);
      $event = new Event($rij["evntID"], $rij["evntDate"], $eventtype, $venue);
      array_push($lijst, $event);
    }
    $dbh = null;
    return $lijst;
  }

  public function getByID($evntID) {
    $sql = "SELECT * FROM events, eventtypes, venues WHERE evntID = :ID AND events.evntName = eventtypes.evntName AND events.venueID = venues.venueID";
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(':ID' => $evntID));
    $rij = $stmt->fetch(PDO::FETCH_ASSOC);


    $venue = new Venue($rij["venueID"], $rij["venueName"], $rij["venueCity"], $rij["venueStreet"], $rij["venueStreetNR"], $rij["venueCapacity"]);
    $eventtype = new EventType($rij["evntName"], $rij["evntDescription"], $rij["evntPrice"]);
    $event = new Event($rij["evntID"], $rij["evntDate"], $eventtype, $venue);
    $dbh = null;
    return $event;
  }

  public function getAllEventTypes() {
    $sql = "SELECT * FROM eventtypes";
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $resultset = $dbh->query($sql);
    $lijst = array();
    foreach ($resultset as $rij) {
      $eventtype = new EventType($rij["evntName"], $rij["evntDescription"], $rij["evntPrice"]);
      array_push($lijst, $eventtype);
    }
    $dbh = null;
    return $lijst;
  }
  
  public function addEvent($evDate,$evName,$venID) {     
      
    $sql = "INSERT INTO events (evntDate,evntName,venueID) values (:evDate, :evName,:venID)";
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(':evDate'=> $evDate,':evName'=> $evName,':venID'=>$venID));  
    $dbh = null;    
  }
  
  public function deleteEvent($evID) {
    $sql = "DELETE * FROM events WHERE evntID = :ID";
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(':ID'=> $evID));  
    $dbh = null;    
  }
  
  public function addEventtype() {
    $_POST["evntName"] = $evName;
    $_POST["evntDescription"] = $evDescription; 
    $_POST["evntPrice"] = $evPrice;
      
    $sql = "INSERT INTO eventtypes (evntName,evntDescription,evntPrice) values (:evName, :evDescription,:evPrice)";
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(':evName'=> $evName,':evDescription'=> $evDescription,':evPrice'=>$evPrice));  
    $dbh = null;    
  }
  
  public function updateEvent($evntID) {
    $_POST["evntDate"] = $evDate;
    $_POST["evntName"] = $evName; 
    $_POST["venueID"] = $venID;
    
    $sql="UPDATE events SET evntDate = :evDame, evntName = :evName, venueID = :venID WHERE evntID = :evntID";
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(':evDate'=> $evDate,':evName'=> $evName,':venID'=>$venID,':evntID'=>$evntID));  
    $dbh = null;            
  }
  
  public function updateEventtupe($evntName) {
    $_POST["evntName"] = $evName;
    $_POST["evntDescription"] = $evDescription; 
    $_POST["evntPrice"] = $evPrice;  
    
    $sql="UPDATE eventtypes SET evntName = :evName, evntDescription = :evDescription, evntPrice = :evPrice WHERE evntName = :evNameID";
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(':evName'=> $evName,':evDescription'=> $evDescription,':evPrice'=>$evPrice,':evNameID'=>$evntName));  
    $dbh = null; 
  }
  
}
