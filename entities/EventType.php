<?php

//Entiteit/eventType.php

class EventType{
    
private $evntName,$evntDescription,$evntPrice;

public function __construct($evntName,$evntDescription,$evntPrice) {
    $this->evntName = $evntName;
    $this->evntDescription = $evntDescription;
    $this->evntPrice = $evntPrice;
}

public function getEvntName() {
    return $this->evntName;
}

public function getEvntDescription() {
    return $this->evntDescription;
}

public function getEvntPrice() {
    return $this->evntPrice;
}
}
