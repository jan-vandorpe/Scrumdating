<?php

//Entiteit/event.php

class event{
    
private $evntName,$evntDate,$evntDescription,$venueID,$evntPrice,$evntID;

public function __construct($evntName,$evntDate,$evntDescription,$venueID,$evntPrice,$evntID) {
    $this->evntName = $evntName;
    $this->evntDate = $evntDate;
    $this->evntDescription = $evntDescription;
    $this->evntLocation = $venueID;
    $this->evntPrice = $evntPrice;
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
