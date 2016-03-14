<?php
require_once 'Library\vendor\autoload.php';

$loader = new Twig_Loader_Filesystem('presentation');
$twig = new Twig_Environment($loader);
$name="Jordy";
$view = $twig->render('test.twig', array('name' => $name, 'username' => 'LoL'));
print($view);
