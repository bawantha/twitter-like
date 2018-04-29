<?php
    class Follow extends  User{
        protected $conn;
        function __construct($c){
            $this->conn=$c;
        }
    }
?>
