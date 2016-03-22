<?php

//Entiteit/user.php

class User{

    private $userID,$username,$password,$email,$sex,$birthDate,$preference,$hairColor,$length,$build,$eyeColor,$oneNight,$longTerm,$friends,$bio,$region,$postcode,$occupation,$smoker,$admin;
    
    private static $usernameMap = array();
    private static $emailMap = array();
    
    public function __construct($userID,$username,$password,$email,$sex,$birthDate,$preference,$hairColor,$length,$build,$eyeColor,$oneNight,$longTerm,$friends,$bio,$region,$postcode,$occupation,$smoker,$admin) {
       if(!isset(self::$usernameMap[$username])){
         self::$usernameMap[$username] = 1;
       }
       if(!isset(self::$emailMap[$email])){
         self::$emailMap[$email] = 1;
       }         
        $this->userID = $userID;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->sex = $sex;
        $this->birthDate = $birthDate;
        $this->preference = $preference;
        $this->hairColor = $hairColor;
        $this->length = $length;
        $this->build = $build;
        $this->eyeColor = $eyeColor;
        $this->oneNight = $oneNight;
        $this->longTerm = $longTerm;
        $this->friends = $friends;
        $this->bio = $bio;
        $this->region = $region;
        $this->postcode = $postcode;
        $this->occupation = $occupation;
        $this->smoker = $smoker;
        $this->admin = $admin;
    }
    
    
    public function getUserID() {
        return $this->userID;
    }
    
    public function getUsername() {
        return $this->username;
    }
    
    public function getPassword() {
        return $this->password;
    }
    
    public function getEmail() {
        return $this->email;
    }
    
    public function getSex() {
        return $this->sex;
    }
    
    public function getBirthDate() {
        return $this->birthDate;
    }
    
    public function getPreference() {
        return $this->preference;
    }
    
    public function getHairColor() {
        return $this->hairColor;
    }
    
    public function getLength() {
        return $this->length;
    }
    
    public function getBuild() {
        return $this->build;
    }
    
    public function getEyeColor() {
        return $this->eyeColor;
    }
    
    public function getOneNight() {
        return $this->oneNight;
    }
    
    public function getLongTerm() {
        return $this->longTerm;
    }
    
    public function getFriends() {
        return $this->friends;
    }
    
    public function getBio() {
        return $this->bio;
    }
    
    public function getRegion() {
        return $this->region;
    }
    
    public function getPostcode() {
        return $this->postcode;
    }
    
    public function getOccupation() {
        return $this->occupation;
    }
    
    public function getSmoker() {
        return $this->smoker;
    }
    
    public function getAdmin() {
        return $this->admin;        
    }
    

    
}

