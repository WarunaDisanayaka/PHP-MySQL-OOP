<?php
    class User {
        public $name;
        public $email;
        public $username;
    
        public function __construct($name, $email, $username) {
            $this->name = $name;
            $this->email = $email;
            $this->username = $username;
        }
    }
    
?>