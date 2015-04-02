<?php
    class User{
        private $firstName, $lastName, $email, $password;
        
        public function __construct($firstName, $lastName, $email,$password){
            $this->$firstName = $firstName;
            $this->$lastName = $lastName;
            $this->$email = $email;
            $this->$password = $password;
        }
        
        public function getEmail(){
            return $this->email;    
        }
        
    }
?>