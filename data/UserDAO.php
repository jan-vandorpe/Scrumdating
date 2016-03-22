<?php

//data/UserDAO.php

require_once 'DBConfig.php';
require_once 'entities/User.php';

$test = new UserDAO();
$test->getByID(3);

class UserDAO {

  public function getAll() {
    $sql = "SELECT * FROM users";
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $resultset = $dbh->query($sql);
    $lijst = array();
    foreach ($resultset as $rij) {
      $user = new user($rij["userID"], $rij["username"], $rij["password"], $rij["email"], $rij["sex"], $rij["birthDate"], $rij["preference"], $rij["hairColor"], $rij["length"], $rij["build"], $rij["eyeColor"], $rij["oneNight"], $rij["longTerm"], $rij["friends"], $rij["bio"], $rij["region"], $rij["postcode"], $rij["occupation"], $rij["smoker"], $rij["admin"]);
      array_push($lijst, $user);
    }
    $dbh = null;
    return $lijst;
  }

  public function getByID($userID) {
    $sql = "SELECT * FROM users WHERE userID = :ID";
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(':ID' => $userID));
    $rij = $stmt->fetch(PDO::FETCH_ASSOC);
    $user = new user($rij["userID"], $rij["username"], $rij["password"], $rij["email"], $rij["sex"], $rij["birthDate"], $rij["preference"], $rij["hairColor"], $rij["length"], $rij["build"], $rij["eyeColor"], $rij["oneNight"], $rij["longTerm"], $rij["friends"], $rij["bio"], $rij["region"], $rij["postcode"], $rij["occupation"], $rij["smoker"], $rij["admin"]);

    $dbh = null;
    return $user;
  }
  public function delete($userID) {
    $sql = "DELETE FROM users WHERE userID = :ID";
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(':ID'=> $userID));  
    $dbh = null;    
  }
  
   public function add($username,$password,$email,$sex,$birthDate,$preference,$hairColor,$length,$build,$eyeColor,$oneNight,$longTerm,$friends,$bio,$region,$postcode,$occupation,$smoker,$admin){
      
    $sql = "INSERT INTO users (username,password,email,sex,birthDate,preference,hairColor,length,build,eyeColor,oneNight,longTerm,friends,bio,region,postcode,occupation,smoker,admin) values (:username,:password,:email,:sex,:birthDate,:preference,:hairColor,:length,:build,:eyeColor,:oneNight,:longTerm,:friends,:bio,:region,:postcode,:occupation,:smoker,:admin)";
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(':username' => $username,':password'=>$password,':email'=>$email,':sex'=>$sex,':birthDate'=>$birthDate,':preference'=>$preference,':hairColor'=>$hairColor,':length'=>$length,':build'=>$build,':eyeColor'=>$eyeColor,':oneNight'=>$oneNight,':longTerm'=>$longTerm,':friends'=>$friends,':bio'=>$bio,':region'=>$region,':postcode'=>$postcode,':occupation'=>$occupation,':smoker'=>$smoker,':admin'=>$admin));  
    $dbh = null;    
  }
  public function update($userID,$username,$password,$email,$sex,$birthDate, $preference,$hairColor,$length,$build,$eyeColor,$oneNight,$longTerm,$friends,$bio,$region,$postcode,$occupation,$smoker,$admin){
    $sql = "UPDATE users SET username = :username,password = :password,email=:email,sex=:sex,birthDate=:birthDate, preference=:preference,hairColor=:hairColor,length=:length,build=:build,eyeColor=:eyeColor,oneNight=:oneNight,longTerm=:longTerm,friends=:friends,bio=:bio,region=:region,postcode=:postcode,occupation=:occupation,smoker=:smoker,admin=:admin WHERE userID = :userID";
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array('userID'=>$userID,':username' => $username,':password'=>$password,':email'=>$email,':sex'=>$sex,':birthDate'=>$birthDate,':preference'=>$preference,':hairColor'=>$hairColor,':length'=>$length,':build'=>$build,':eyeColor'=>$eyeColor,':oneNight'=>$oneNight,':longTerm'=>$longTerm,':friends'=>$friends,':bio'=>$bio,':region'=>$region,':postcode'=>$postcode,':occupation'=>$occupation,':smoker'=>$smoker,':admin'=>$admin));  
    $dbh = null;    
  }
  
  public function checkLogin($username,$password) {
    $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(':username' => $username,':password' => $password));
    $rij = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if($rij == false){
        return $login = false;
    }
    else{
        $user = new user($rij["userID"], $rij["username"], $rij["password"], $rij["email"], $rij["sex"], $rij["birthDate"], $rij["preference"], $rij["hairColor"], $rij["length"], $rij["build"], $rij["eyeColor"], $rij["oneNight"], $rij["longTerm"], $rij["friends"], $rij["bio"], $rij["region"], $rij["postcode"], $rij["occupation"], $rij["smoker"], $rij["admin"]);
        return $user;
    }
    $dbh = null;
  }
  
  public function registreerUser($username,$password,$email) {
      $sql = "INSERT INTO users (username,password,email) values (:username,:password,:email)";
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(':username' => $username,':password'=>$password,':email'=>$email));    
    
    $sql = "SELECT * FROM users WHERE username= :username AND password= :password";
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(':username' => $username, ':password' => $password));
    $rij = $stmt->fetch(PDO::FETCH_ASSOC);
    $user = new user($rij["userID"], $rij["username"], $rij["password"], $rij["email"], $rij["sex"], $rij["birthDate"], $rij["preference"], $rij["hairColor"], $rij["length"], $rij["build"], $rij["eyeColor"], $rij["oneNight"], $rij["longTerm"], $rij["friends"], $rij["bio"], $rij["region"], $rij["postcode"], $rij["occupation"], $rij["smoker"], $rij["admin"]);

    $dbh = null;
    return $user;       
  }
  
  public function updateUser($userID,$username,$password,$email,$sex,$birthDate, $preference,$hairColor,$length,$build,$eyeColor,$oneNight,$longTerm,$friends,$bio,$region,$postcode,$occupation,$smoker){
    $sql = "UPDATE users SET username = :username,password = :password,email=:email,sex=:sex,birthDate=:birthDate, preference=:preference,hairColor=:hairColor,length=:length,build=:build,eyeColor=:eyeColor,oneNight=:oneNight,longTerm=:longTerm,friends=:friends,bio=:bio,region=:region,postcode=:postcode,occupation=:occupation,smoker=:smoker WHERE userID = :userID";
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array('userID'=>$userID,':username' => $username,':password'=>$password,':email'=>$email,':sex'=>$sex,':birthDate'=>$birthDate,':preference'=>$preference,':hairColor'=>$hairColor,':length'=>$length,':build'=>$build,':eyeColor'=>$eyeColor,':oneNight'=>$oneNight,':longTerm'=>$longTerm,':friends'=>$friends,':bio'=>$bio,':region'=>$region,':postcode'=>$postcode,':occupation'=>$occupation,':smoker'=>$smoker));  
    $dbh = null;    
  }
  

}
