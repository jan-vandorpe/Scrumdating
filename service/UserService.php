<?php
//service/UserService.php
require_once 'UserDAO.php';

class UserService {
  public function getUserList(){
    $userDAO = new UserDAO;
    $list = $userDAO->getAll();
    return $list;
  }
  
  public function getUserById($id){
    $userDAO = new UserDAO;
    $user = $userDAO->getById();
    return $user;
  }  
}