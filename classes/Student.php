<?php

include_once 'User.php';

class Student extends User {
    private $course;

    public function __construct($name, $email, $username, $course) {
        parent::__construct($name, $email, $username);
        $this->course = $course;
    }

    public function getCourse() {
        return $this->course;
    }

    public function setCourse($course) {
        $this->course = $course;
    }
}
?>