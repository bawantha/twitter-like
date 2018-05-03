<?php
    include 'databases/connection.php';
    include 'classes/user.php';
    include 'classes/tweet.php';        
    include 'classes/follow.php';
   // include '../debug/ChromePhp.php';

    global $conn;

    session_start();

    $getFromU=new User($conn);
    $getFromT=new Tweet($conn);
    $getFromF=new Follow($conn);

    define("BASE_URL","http//localhost/twitter-like/");


?>