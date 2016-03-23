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
    
}