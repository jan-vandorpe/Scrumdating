<?php

require_once 'DBConfig.php';
require_once '../entities/Event.php';

$test = new UserDAO();
$test->getByID(8);

class UserDAO{
    
    public function getAll(){
        $sql ="SELECT * FROM events";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,  DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultset = $dbh->query($sql);
        $lijst = array();
        foreach ($resultset as $rij) {
            $event = new event($rij["evntID"],$rij["evntDate"],$rij["evntName"],$rij["venueID"]);
            array_push($lijst, $event);
        }
    $dbh = null;
    return $lijst;
}

    public function getByID($evntID) {       
        $sql ="SELECT * FROM events WHERE evntID = :ID";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,  DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':ID' => $evntID));
        $resultset = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $lijst = array();
        
        foreach ($resultset as $rij) {
            $event = new event($rij["evntID"],$rij["evntDate"],$rij["evntName"],$rij["venueID"]);
            array_push($lijst, $event);
        }
    $dbh = null;
    return $lijst;
    }
}
