<?php

require_once 'data/EventLineDAO.php';

class EventLineService{
    
    public function Inschrijven($userID,$evntID) {
        $EventLineDAO = new EventLineDAO();
        $EventLineDAO->Inschrijven($userID,$evntID);
    }    
    
    public function IngeschrevenByID($userID) {
        $EventLineDAO = new EventLineDAO();
        $lijst = $EventLineDAO->IngeschrevenByID($userID);
        return $lijst;
    }    
}

