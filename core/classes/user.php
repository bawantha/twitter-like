<?php
include './debug/ChromePhp.php';//TODO remove debug
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
        $password=md5($password);
        $query="SELECT `id` FROM `users` WHERE `email` = '$email' AND `password` = '$password'";
        $result=mysqli_query($this->conn,$query);
        $row=mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)==1){
            $_SESSION["user_id"]=$row['id'];
            header("Location:home.php");
            }else{
                return false;
            }
        }
    }


    

?>