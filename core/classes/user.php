<?php
    class User{
        protected $conn;

        function __construct($c){
            $this->conn=$c;
        }


        
        public function checkInput($var){
                $var=htmlspecialchars($var);
                $var=trim($var);
                $var=stripslashes($var);
                return $var;
        }  
        
        
        public function login($email,$password){
        $result=mysqli_query($this->conn,"SELECT `id` FROM `users` WHERE `email`={$email} and `password` =");
        }
    }


    

?>