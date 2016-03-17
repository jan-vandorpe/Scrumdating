<?php
require_once 'library\vendor\autoload.php';
require_once 'service\UserService.php';

$userSvc = new UserService();
$user = $userSvc->getUserByID($_GET['user']);

//initialize twig environment
$loader = new Twig_Loader_Filesystem('presentation');
$twig = new Twig_Environment($loader);

//execute twig page
$view = $twig->render('profiel.twig', array('user' => $user));
print($view);