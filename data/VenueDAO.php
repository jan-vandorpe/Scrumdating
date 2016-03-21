<?php

require_once 'DBConfig.php';
require_once 'entities/Venue.php';

class VenueDAO {

  public function getAll() {
    $sql = "SELECT * FROM venues";
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $resultset = $dbh->query($sql);
    $lijst = array();
    foreach ($resultset as $rij) {
      $venue = new Venue($rij["venueID"], $rij["venueName"], $rij["venueCity"], $rij["venueStreet"], $rij["venueStreetNR"], $rij["venueCapacity"]);
      array_push($lijst, $venue);
    }
    $dbh = null;
    return $lijst;
  }

  public function getByID($venueID) {
    $sql = "SELECT * FROM venues WHERE venueID = :ID";
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(':ID' => $venueID));
    $rij = $stmt->fetch(PDO::FETCH_ASSOC);

    $venue = new Venue($rij["venueID"], $rij["venueName"], $rij["venueCity"], $rij["venueStreet"], $rij["venueStreetNR"], $rij["venueCapacity"]);
    
    $dbh = null;
    return $venue;
  }
  public function add($venueName, $venueCity,$venueStreet,$venueStreetNR,$venueCapacity) {
   $sql = "INSERT INTO venues (venueName,venueCity,venueStreet,venueStreetNR,venueCapacity) values (:venueName,:venueCity,:venueStreet,:venueStreetNR,:venueCapacity)";
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(':venueName'=>$venueName,':venueCity'=>$venueCity,':venueStreet'=>$venueStreet,':venueStreetNR'=>$venueStreetNR,':venueCapacity'=>$venueCapacity));  
    $dbh = null;    
  }

}
