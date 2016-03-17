<?php

require_once 'DBConfig.php';
require_once 'entities/Event.php';
require_once 'entities/EventType.php';
require_once 'entities/Venue.php';

class EventDAO {

  public function getAll() {
    $sql = "SELECT * FROM events, eventtypes, venues WHERE events.evntName = eventtypes.evntName AND events.venueID = venues.venueID";
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
    $sql = "SELECT * FROM events WHERE evntID = :ID AND events.evntName = eventtypes.evntName";
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(':ID' => $evntID));
    $resultset = $stmt->fetch(PDO::FETCH_ASSOC);


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

}
