<?php

//Entiteit/event.php

class event{
    
private $evntName,$evntDate,$venueID,$evntID;

public function __construct($evntID,$evntDate,$evntName,$venueID) {
    $this->evntName = $evntName;
    $this->evntDate = $evntDate;
    $this->venueID = $venueID;
    $this->evntID = $evntID;    
}

public function getEvntName() {
    return $this->evntName;
}

public function getEvntDate() {
    return $this->evntDate;
}

public function getEvntDescription() {
    return $this->evntDescription;
}

public function getVenueID() {
    return $this->venueID;
}
    
public function getEvntPrice() {
    return $this->evntPrice;
}

public function getEvntID() {
    return $this->evntID;
}

}
