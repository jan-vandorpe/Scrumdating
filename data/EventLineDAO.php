<?php

require_once 'DBConfig.php';
require_once 'entities/EventLine.php';

class EventLineDAO{
    
    public function Inschrijven($userID,$evntID) {
        
    $sql = "INSERT INTO eventline (userID,evntID) values (:userID, :evID)";
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(':userID'=> $userID,':evID'=> $evntID));  
    $dbh = null;      
    }
    
    public function IngeschrevenByID($userID) {
        
    $sql = "SELECT evntID FROM eventline WHERE userID= :userID";
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(':userID' => $userID));
    $lijst = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $dbh = null;
    return $lijst;
    }
    public function Uitschrijven($userID,$evntID){
    $sql = "DELETE FROM eventline WHERE userID = :userID AND evntID = :evntID";
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(':userID'=> $userID,':evntID'=> $evntID));  
    $dbh = null;   
    }       
}
