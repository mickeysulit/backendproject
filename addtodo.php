<?php

if (session_status() == PHP_SESSION_NONE)
    session_start();

require 'mysql.php';

$activity = trim($_POST['activity']);
$description = trim($_POST['description']);

try {
        // activity should not be blank to be added
        if ( $activity <> '' )  {
            //conn to the db mysql
            $conn = new PDO($mydsn, $myusrnme, $mypsswrd, $options);
    
            //get the data from the form
            $newtodo = array( 
            "userid" => $_SESSION['usersid'], 
            "activity" => $activity,
            "description" => $description,
            );
		
            // build the sql string
            $sql = "INSERT INTO todo (userid, activity, description) VALUES (:userid, :activity, :description)";
            $statement = $conn->prepare($sql);
            $statement->execute($newtodo);
            $activity = '';
            $description = '';
            include('homeview.php');
        } else {
            include('homeview.php');
        } 
 	} catch(PDOException $error) {
        
        $_SESSION['activity'] = $activity;
        $_SESSION['description'] = $description;
		
        include('homeview.php');
   
   }
?>