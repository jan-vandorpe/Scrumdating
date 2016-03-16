<?php
//data/UserDAO.php

require_once 'DBConfig.php';
require_once 'entities/User.php';

class UserDAO{
    
    public function getAll(){
        $sql ="SELECT * FROM users";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,  DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultset = $dbh->query($sql);
        $lijst = array();
        foreach ($resultset as $rij) {
            $user = new user($rij["userID"],$rij["username"],$rij["password"],$rij["email"],$rij["sex"],$rij["birthDate"],$rij["preference"],$rij["hairColor"],$rij["length"],$rij["build"],$rij["eyeColor"],$rij["oneNight"],$rij["longTerm"],$rij["friends"],$rij["bio"],$rij["region"],$rij["postcode"],$rij["occupation"],$rij["smoker"],$rij["admin"]);
            array_push($lijst, $user);
        }
    $dbh = null;
    return $lijst;
}

    public function getByID($userID) {       
        $sql ="SELECT * FROM users WHERE userID = :ID";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,  DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':ID' => $userID));
        $resultset = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $lijst = array();
        
        foreach ($resultset as $rij) {
            $user = new user($rij["userID"],$rij["username"],$rij["password"],$rij["email"],$rij["sex"],$rij["birthDate"],$rij["preference"],$rij["hairColor"],$rij["length"],$rij["build"],$rij["eyeColor"],$rij["oneNight"],$rij["longTerm"],$rij["friends"],$rij["bio"],$rij["region"],$rij["postcode"],$rij["occupation"],$rij["smoker"],$rij["admin"]);
            array_push($lijst, $user);
        }
    $dbh = null;
    return $lijst;
    }
}

