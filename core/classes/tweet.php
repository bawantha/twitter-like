<?php
class Tweet extends User{
    protected $conn;
        function __construct($c){
            $this->conn=$c;
        }
    }


?>