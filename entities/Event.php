<?php

//Entiteit/event.php

class Event{
    
private $evntType,$evntDate,$venue,$evntID;

public function __construct($evntID,$evntDate,$evntType,$venue) {
    $this->evntType = $evntType;
    $date=date('Y-m-d',strtotime($evntDate));
    $this->evntDate = $date;
    $this->venue = $venue;
    $this->evntID = $evntID;    
}

public function getEvntType() {
    return $this->evntType;
}

public function getEvntDate() {
    return $this->evntDate;
}

public function getEvntDescription() {
    return $this->evntDescription;
}

public function getVenue() {
    return $this->venue;
}
    
public function getEvntPrice() {
    return $this->evntPrice;
}

public function getEvntID() {
    return $this->evntID;
}

}
