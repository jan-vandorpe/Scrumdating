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

  public function updateUser($userID, $username, $password, $email, $sex, $birthDate, $preference, $hairColor, $length, $build, $eyeColor, $oneNight, $longTerm, $friends, $bio, $region, $postcode, $occupation, $smoker, $admin) {
    $userDAO = new UserDAO();
    $userDAO->update($userID, $username, $password, $email, $sex, $birthDate, $preference, $hairColor, $length, $build, $eyeColor, $oneNight, $longTerm, $friends, $bio, $region, $postcode, $occupation, $smoker, $admin);
  }

}
