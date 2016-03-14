<?php
require_once 'Library\vendor\autoload.php';

$loader = new Twig_Loader_Filesystem('Presentation');
$twig = new Twig_Environment($loader);
$name="Gregory";
$view = $twig->render('index.twig', array('name' => $name, 'username' => 'Jordy is a noob'));
print($view);
