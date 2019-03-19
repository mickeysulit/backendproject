<?php

require 'mysql';

try {

        // use this command to connect to the database
        $connection = new PDO($mydsn, $myusrnme, $mypsswrd, $options);
    
        //get the data from the form
        $newuser = array( 
            "username" => "user1", 
            "password" => "password1",
            "fname" => "First Name",
            "lname" => "Last Name", 
        );
		
        // Put the command sting to be executed mysql
        $sql = "INSERT INTO users (username, password, fname, lname) VALUES (:username, :password, :fname, :lname)";
        // Set the statement and execute the statment
        $statement = $connection->prepare($sql);
        $statement->execute($newuser);
        
        // get the result
        $result = $statement->fetchAll();

        print_r($result);
	} catch(PDOException $error) {
        // if there is an error, tell us what it is
		echo $sql . "<br>" . $error->getMessage();
   
   }