<?php

//Entities/Venue.php

class Venue{
    
    private $venueID,$venueName,$venueCity,$venueStreet,$venueStreetNR,$venueCapacity;
    
    private static $venueNameMap = array();


    public function __construct($venueID,$venueName,$venueCity,$venueStreet,$venueStreetNR,$venueCapacity) {
       
        if(!isset(self::$venueNameMap[$venueName])){
        $this->venueID = $venueID;
        $this->venueName = $venueName;
        $this->venueCity = $venueCity;
        $this->venueStreet = $venueStreet;
        $this->venueStreetNR = $venueStreetNR;
        $this->venueCapacity= $venueCapacity;
        }
    }
    
    public function getVenueID() {
        return $this->venueID;
    }
    
    public function getVenueName() {
        return $this->venueName;
    }
    
    public function getVenueCity() {
        return $this->venueCity;
    }
    
    public function getVenueStreet() {
        return $this->venueStreet;
    }
    
    public function getVenueStreetNR() {
        return $this->venueStreetNR;
    }
    
    public function getVenueCapacity() {
        return $this->venueCapacity;
    }
    
}