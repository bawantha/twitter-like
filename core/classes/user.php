<?php
    class User{
        protected $conn;

        function __construct($c){
            $this->conn=$c;
        }
    }
?>