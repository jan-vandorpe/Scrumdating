<?php
require_once 'Library\vendor\autoload.php';

$loader = new Twig_Loader_Filesystem('presentation');
$twig = new Twig_Environment($loader);
class User {
  private $name;
  
  public function __construct($name) {
    $this->name=$name;
  }
  public function getName(){
    return $this->name;
  }
}
$user = new User('jordy');

$view = $twig->render('test.twig', array('user' => 'bart'));
print($view);
