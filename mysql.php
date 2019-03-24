<?php

// setup the connection to msyql database
// user name and password for the mysql server

    $myserver = "localhost";
    $myusrnme = "root";
    $mypsswrd = "root";
    $mydbname = "backend";
    $mydsn = "mysql:host=$myserver;dbname=$mydbname";

    $options = array (
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    )

        
?>