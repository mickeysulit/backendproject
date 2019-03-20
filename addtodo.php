<?php

if (session_status() == PHP_SESSION_NONE)
    session_start();

require 'mysql.php';

$activity = trim($_POST['activity']);
$description = trim($_POST['description']);

try {
        // activity should not be blank to be added
        if ( $activity <> '' )  {
            // use this command to connect to the database
            $connection = new PDO($mydsn, $myusrnme, $mypsswrd, $options);
    
            //get the data from the form
            $newtodo = array( 
            "userid" => $_SESSION['usersid'], 
            "activity" => $activity,
            "description" => $description,
            );
		
            // Put the command sting to be executed mysql
            $sql = "INSERT INTO todo (userid, activity, description) VALUES (:userid, :activity, :description)";
            // Set the statement and execute the statment
            $statement = $connection->prepare($sql);
            $statement->execute($newtodo);
            $activity = '';
            $description = '';
            include('homeview.php');
        } else {
            include('homeview.php');
        } 
 	} catch(PDOException $error) {
        // if there is an error, tell us what it is
		echo $sql . "<br>" . $error->getMessage();
        include('homeview.php');
   
   }
?>