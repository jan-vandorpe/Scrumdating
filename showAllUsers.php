<?php
//showAllUsers.php
require_once 'service/UserService.php';
require_once 'Library\vendor\autoload.php';

//get all users
$userSvc = new UserService();
$userLijst = $userSvc->getUserList();

//initialize twig environment
$loader = new Twig_Loader_Filesystem('presentation');
$twig = new Twig_Environment($loader);

//execute twig page
$view = $twig->render('userList.twig', array('userList' => $userLijst));
print($view);

