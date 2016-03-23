<?php

require_once 'data/EventLineDAO.php';

class EventLineService{
    
    public function Inschrijven($userID,$evntID) {
        $EventLineDAO = new EventLineDAO();
        $EventLineDAO->Inschrijven($userID,$evntID);
    }    
}

