<?php

//Entiteit/EventLine.php

class EventLine{
    
private $userID,$evntID;

public function __construct($userID,$evntID) {
    $this->userID = $userID;    
    $this->evntID = $evntID;    
}

public function getuserID() {
    return $this->userID;
}

public function getEvntID() {
    return $this->evntID;
}

}