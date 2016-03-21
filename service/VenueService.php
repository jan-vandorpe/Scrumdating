<?php
//service/EventService.php
require_once 'data/VenueDAO.php';

class VenueService {
  public function getVenueList(){
    $venueDAO = new VenueDAO();
    $list = $venueDAO->getAll();
    return $list;
  }
  
  public function getVenueByID($venueID){
    $venueDAO = new VenueDAO();
    $venue = $venueDAO->getById($venueID);
    return $venue;
  }
  public function addVenue($venueName, $venueCity,$venueStreet,$venueStreetNR,$venueCapacity) {
    $venueDAO = new VenueDAO();
    $venueDAO->add($venueName, $venueCity,$venueStreet,$venueStreetNR,$venueCapacity);
  }
  public function deleteVenue($venueID){
    $venueDAO = new VenueDAO();
    $venueDAO->delete($venueID);
  }
}
