<?php

// setup the connection to msyql database

    $myserver = "localhost";
    $myusrnme = "root";
    $mypsswrd = "root";
    $mydbname = "backend";
    $mydsn = "mysql:host=$myserver;dbname=$mydbname";

    $options = array (
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    )

        
?>