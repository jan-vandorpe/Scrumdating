<?php

require_once 'data/EventLineDAO.php';

class EventLineService{
    
    public function Inschrijven($userID,$evntID) {
        $eventLineDAO = new EventLineDAO();
        $eventLineDAO->Inschrijven($userID,$evntID);
    }
    public function Uitschrijven($userID,$evntID){
      $eventLineDAO = new EventLineDAO();
      $eventLineDAO->Uitschrijven($userID,$evntID);
    }    
    
    public function IngeschrevenByID($userID) {
        $EventLineDAO = new EventLineDAO();
        $lijst = $EventLineDAO->IngeschrevenByID($userID);
        return $lijst;
    }    
}

