<?php
//service/UserService.php
require_once 'data/UserDAO.php';

class UserService {
  public function getUserList(){
    $userDAO = new UserDAO();
    $list = $userDAO->getAll();
    return $list;
  }
  
  public function getUserByID($userID){
    $userDAO = new UserDAO();
    $user = $userDAO->getById($userID);
    return $user;
  }
  
  public function verifyUserLogin($username,$password){
    $userDAO = new UserDAO();
    $login = $userDAO->verifyLogin($username,$password);
    return $login;
  }
}