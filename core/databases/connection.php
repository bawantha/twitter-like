<?php
    define("host","localhost");
    define("username","root");
    define("password","");
    define("dbname","twitter");
    $conn=mysqli_connect(host,username,password,dbname);
    if(!$conn){
        die("Connection failed");
    }

?>