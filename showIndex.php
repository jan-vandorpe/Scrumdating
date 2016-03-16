<?php
//showIndex.php

//Verwijst naar de twig library
require_once 'library/vendor/autoload.php';

//Verwijst naar de DAO userDAO
require_once 'service/UserService.php';

//vertel Twig in welke map onze templates (html paginas) zitten
$loader = new Twig_Loader_Filesystem('presentation');

//laad nieuwe Twig Environment vanuit die map
$twig = new Twig_Environment($loader);

if(isset($_SESSION['login'])){ //Gebruiker al ingelogd?
  $userSvc = new UserService();
  $user = $userSvc->getUserById($_SESSION['login']); //haal gegevens van die gebruiker op
  if ($user==null){ 
    unset($_SESSION['login']); //geen gebruiker gevonden? Unset de session want verkeerd
    $user = "Guest";
  }
} else {
  $user = "Guest";
}

//zet alle variabelen klaar in de presentatie pagina
$view = $twig->render('index.twig', array('user' => $user));

//toon de pagina
print($view);
