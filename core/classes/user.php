<?php

    class User
    {
        protected $conn;


        function __construct($c)
        {

            $this->conn = $c;
        }


        public function checkInput($var)
        {
            $var = htmlspecialchars($var);
            $var = trim($var);
            $var = stripslashes($var);
            return $var;
        }


        public function login($email, $password)
        {
            $password = md5($password);
            $query = "SELECT `id` FROM `users` WHERE `email` = '$email' AND `password` = '$password'";
            $result = mysqli_query($this->conn, $query);
            $row = mysqli_fetch_assoc($result);
            if (mysqli_num_rows($result) == 1) {
                $_SESSION["user_id"] = $row['id'];
                header("Location:home.php");
            } else {
                return false;
            }
        }


        public function userData($user_id)
        {
            $result = mysqli_query($this->conn,"SELECT * FROM `users` WHERE  `id`='$user_id' ");
            return mysqli_fetch_assoc($result);
        }

        public function logOut(){
            $_SESSION==array();
            session_destroy();
            header("Location:../index.php");
        }

        public  function checkEmail($email){
            $result=mysqli_query($this->conn, "SELECT `email` FROM `users` WHERE `email`='$email'");
            $rowNum=mysqli_num_rows($result);
            if($rowNum==1){
                return false;
            }else{
                return true;
            }
        }

        public function register($email,$password,$screenName){
            mysqli_query($this->conn, "INSERT INTO `users` (`id`, `username`, `email`, `password`, `screenName`, `profileImage`, `profileCover`, `following`, `followers`, `bio`, `country`, `website`) VALUES (NULL, '', '$email', MD5('$password'), '$screenName', 'assets/images/defaultprofileimage.png', 'assets/images/defaultCoverImage.png', '', '', '', '', '')");
            $user_id=mysqli_insert_id($this->conn);
            $_SESSION['user_id']=$user_id;

        }
}

    

?>+