<?php
//showIndex.php

//Verwijst naar de twig library
require_once 'library/vendor/autoload.php';

//Verwijst naar de DAO userDAO
require_once 'service/UserService.php';
session_start();

//vertel Twig in welke map onze templates (html paginas) zitten
$loader = new Twig_Loader_Filesystem('presentation');

//laad nieuwe Twig Environment vanuit die map
$twig = new Twig_Environment($loader);

if(isset($_SESSION['login'])){ //Gebruiker al ingelogd?
  $login = $_SESSION['login'];   
} else {
  $login = false;
}

//zet alle variabelen klaar in de presentatie pagina
$view = $twig->render('index.twig', array('login' => $login));

//toon de pagina
print($view);
