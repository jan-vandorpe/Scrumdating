<?php

//service/UserService.php
require_once 'data/UserDAO.php';

class UserService {

  public function getUserList() {
    $userDAO = new UserDAO();
    $list = $userDAO->getAll();
    return $list;
  }

  public function getUserByID($userID) {
    $userDAO = new UserDAO();
    $user = $userDAO->getById($userID);
    return $user;
  }

  public function verifyUserLogin($username, $password) {
    $userDAO = new UserDAO();
    $login = $userDAO->verifyLogin($username, $password);
    return $login;
  }

  public function addUser($username, $password, $email, $sex, $birthDate, $preference, $hairColor, $length, $build, $eyeColor, $oneNight, $longTerm, $friends, $bio, $region, $postcode, $occupation, $smoker, $admin) {
    $userDAO = new UserDAO();
    $userDAO->add($username, $password, $email, $sex, $birthDate, $preference, $hairColor, $length, $build, $eyeColor, $oneNight, $longTerm, $friends, $bio, $region, $postcode, $occupation, $smoker, $admin);
  }

  public function deleteUser($userID) {
    $userDAO = new UserDAO();
    $userDAO->delete($userID);
  }

  public function update($userID, $username, $password, $email, $sex, $birthDate, $preference, $hairColor, $length, $build, $eyeColor, $oneNight, $longTerm, $friends, $bio, $region, $postcode, $occupation, $smoker, $admin) {
    $userDAO = new UserDAO();
    $userDAO->update($userID, $username, $password, $email, $sex, $birthDate, $preference, $hairColor, $length, $build, $eyeColor, $oneNight, $longTerm, $friends, $bio, $region, $postcode, $occupation, $smoker, $admin);
  }
  public function checkLogin($username,$password){
    $userDAO = new UserDAO();
    $user = $userDAO->checkLogin($username,$password);
    return $user;
  }
  
  public function registreerUser($username,$password,$email){
      $userDAO = new UserDAO();
      $user = $userDAO->registreerUser($username,$password,$email);
      return $user;
  }
  
  public function updateUser($userID, $username, $password, $email, $sex, $birthDate, $preference, $hairColor, $length, $build, $eyeColor, $oneNight, $longTerm, $friends, $bio, $region, $postcode, $occupation, $smoker) {
    $userDAO = new UserDAO();
    $userDAO->updateUser($userID, $username, $password, $email, $sex, $birthDate, $preference, $hairColor, $length, $build, $eyeColor, $oneNight, $longTerm, $friends, $bio, $region, $postcode, $occupation, $smoker);
  }
  public function getUsersBySexuality($sex,$preference){
    $userDAO = new UserDAO();
    $matches=$userDAO->getBySexuality($sex, $preference);
    
    return $matches;
  }

}
