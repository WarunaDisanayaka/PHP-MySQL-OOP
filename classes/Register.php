<?php

// Include necessary files
include_once "lib/Database.php";
include_once "Student.php";

// Define a class named "Register"
class Register
{
    public $db;

    // Constructor function that initializes a Database object
    public function __construct()
    {
        $this->db = new Database();
    }

    // Function to add a student to the database
    public function addStudent($data)
    {
        // Extract data from the array
        $name = $data["name"];
        $email = $data["email"];
        $username = $data["username"];
        $course = $data["course"];
        $user_type = "student";

        // Validate data
        if (
            empty($name) ||
            empty($email) ||
            empty($username) ||
            empty($course)
        ) {
            $msg = "All fields must be filled";

            return $msg;
        }

        // Create a new Student object
        $student = new Student($name, $email, $username, $course);

        // Insert student data into the database
        $query = "INSERT INTO student(name, email, username, course, user_type) VALUES ('$name','$email','$username','$course','$user_type')";

        // Return success or failure message
        $result = $this->db->insert($query);

        if ($result) {
            $msg = "Student added success";
            return $msg;
        } else {
            $msg = "Student adding failed";
            return $msg;
        }
    }

    // Function to retrieve all students from the database
    public function allStudent()
    {
        $query = "SELECT * FROM student";
        $result = $this->db->select($query);
        return $result;
    }

    // Function to retrieve all tutors from the database
    public function allTutors()
    {
        $query = "SELECT * FROM tutor";
        $result = $this->db->select($query);
        return $result;
    }

    // Function to retrieve a student by ID from the database
    public function getStdById($id)
    {
        $query = "SELECT * FROM student WHERE id='$id'";
        $result = $this->db->select($query);
        return $result;
    }

    // Function to retrieve a tutor by ID from the database
    public function getTutorById($id)
    {
        $query = "SELECT * FROM tutor WHERE id='$id'";
        $result = $this->db->select($query);
        return $result;
    }

    // Function to update a student in the database
    public function updateStudent($data, $id)
    {
        $name = $data["name"];
        $email = $data["email"];
        $username = $data["username"];
        $course = $data["course"];
        $user_type = "student";

        // Validate data
        if (
            empty($name) ||
            empty($email) ||
            empty($username) ||
            empty($course)
        ) {
            $msg = "All fields must be filled";

            return $msg;
        }
        
        // Update student data in the database
        $query = "UPDATE student SET name='$name',email='$email',username='$username',course='$course',user_type='$user_type' WHERE id='$id'";

        $result = $this->db->insert($query);

        // Return success or failure message
        if ($result) {
            $msg = "Update success";
            return $msg;
        } else {
            $msg = "Update failed";
            return $msg;
        }
    }

    // Function to add a tutor to the database
    public function addTutors($data)
    {
        $name = $data["name"];
        $email = $data["email"];
        $username = $data["username"];
        $course = $data["course"];
        $qualifications = $data["qualification"];
        $user_type = "tutor";

        if (
            empty($name) ||
            empty($email) ||
            empty($username) ||
            empty($course)
        ) {
            $msg = "All fields must be filled";

            return $msg;
        }
        $query = "INSERT INTO tutor(name, email, username, course, qualification ,user_type) VALUES ('$name','$email','$username','$course','$qualifications','$user_type')";

        $result = $this->db->insert($query);

        if ($result) {
            $msg = "Tutor added success!";
            return $msg;
        } else {
            $msg = "Tutor added failed";
            return $msg;
        }
    }


     // Function to update a tutor in the database
     public function updateTutor($data, $id)
     {
         $name = $data["name"];
         $email = $data["email"];
         $username = $data["username"];
         $course = $data["course"];
         $qualifications = $data["qualification"];
         $user_type = "tutor";
 
         // Validate data
         if (
             empty($name) ||
             empty($email) ||
             empty($username) ||
             empty($course)||
             empty($qualifications)
         ) {
             $msg = "All fields must be filled";
 
             return $msg;
         }
         
         // Update student data in the database
         $query = "UPDATE tutor SET name='$name',email='$email',username='$username',course='$course',qualification='$qualifications',user_type='$user_type' WHERE id='$id'";
 
         $result = $this->db->insert($query);
 
         // Return success or failure message
         if ($result) {
             $msg = "Update success";
             return $msg;
         } else {
             $msg = "Update failed";
             return $msg;
         }
     }
}
?>
