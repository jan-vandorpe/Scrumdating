<?php

//Entiteit/event.php

class event{
    
private $evntName,$evntDate,$evntDescription,$evntLocation,$evntPrice,$evntID;

public function __construct($evntName,$evntDate,$evntDescription,$evntLocation,$evntPrice,$evntID) {
    $this->evntName = $evntName;
    $this->evntDate = $evntDate;
    $this->evntDescription = $evntDescription;
    $this->evntLocation = $evntLocation;
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

public function getEvntLocation() {
    return $this->evntLocation;
}
    
public function getEvntPrice() {
    return $this->evntPrice;
}

public function getEvntID() {
    return $this->evntID;
}

}
