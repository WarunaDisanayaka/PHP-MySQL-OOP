<?php

        include_once 'lib/Database.php';

        class Register{
            public $db;

            public function __construct(){
                $this->db = new Database();

            }

            public function addStudent($data){
                 $name = $data['name'];
                $email = $data['email'];
                $username = $data['username'];
               $course = $data['course'];
               $user_type="student";


                if (empty($name)||empty($email)||empty($username)||empty($course)) {
                    $msg = "All fields must be filled";

                    return $msg;
                }
                    $query="INSERT INTO student(name, email, username, course, user_type) VALUES ('$name','$email','$username','$course','$user_type')";

                    $result = $this->db->insert($query);

                    if ($result) {
                        $msg = "Registration success";
                        return $msg;
                    }else{
                        $msg = "Registration failed";
                        return $msg;
                    }
                

            }


            public function allStudent(){
                $query = "SELECT * FROM student";
                $result = $this->db->select($query);
                return $result;
            }

            public function allTutors(){
                $query = "SELECT * FROM tutor";
                $result = $this->db->select($query);
                return $result;
            }

            public function getStdById($id){
                $query = "SELECT * FROM student WHERE id='$id'";
                $result = $this->db->select($query);
                return $result;
            }

            public function updateStudent($data,$id){
                $name = $data['name'];
               $email = $data['email'];
               $username = $data['username'];
              $course = $data['course'];
              $user_type="student";


               if (empty($name)||empty($email)||empty($username)||empty($course)) {
                   $msg = "All fields must be filled";

                   return $msg;
               }
                //    $query="INSERT INTO student(name, email, username, course, user_type) VALUES ('$name','$email','$username','$course','$user_type')";

                   $query="UPDATE student SET name='$name',email='$email',username='$username',course='$course',user_type='$user_type' WHERE id='$id'";

                   $result = $this->db->insert($query);

                   if ($result) {
                       $msg = "Update success";
                       return $msg;
                   }else{
                       $msg = "Update failed";
                       return $msg;
                   }
               

           }


           public function addTutors($data){
            $name = $data['name'];
            $email = $data['email'];
            $username = $data['username'];
            $course = $data['course'];
            $qualifications=$data['qualification'];
            $user_type="tutor";


           if (empty($name)||empty($email)||empty($username)||empty($course)) {
               $msg = "All fields must be filled";

               return $msg;
           }
               $query="INSERT INTO tutor(name, email, username, course, qualification ,user_type) VALUES ('$name','$email','$username','$course','$qualifications','$user_type')";

               $result = $this->db->insert($query);

               if ($result) {
                   $msg = "Tutor added success!";
                   return $msg;
               }else{
                   $msg = "Tutor added failed";
                   return $msg;
               }
           

       }
            

        }
?>