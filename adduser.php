<?php
require 'mysql.php';

// set the data to a temporary variable.  Have to strip off the spaces
// to make sure they match
$username = trim($_POST['username']);
$fname = trim($_POST['fname']);
$lname = trim($_POST['lname']);
$password_1 = trim($_POST['password_1']);
$password_2 = trim($_POST['password_2']); 

if (($password_1 == $password_2) && 
    ($username <> '' &&
     $fname <> '' &&
     $lname <> '' &&
     $password_1 <> ''
    ) ) 
{
    try {

        // use this command to connect to the database
        $connection = new PDO($mydsn, $myusrnme, $mypsswrd, $options);
    
        //get the data from the form
        $newuser = array( 
            "username" => $_POST['username'], 
            "password" => $_POST['password_1'],
            "fname" => $_POST['fname'],
            "lname" => $_POST['lname'], 
        );
		
        print_r($newuser);
        // Put the command sting to be executed mysql
        $sql = "INSERT INTO users (username, password, fname, lname) VALUES (:username, :password, :fname, :lname)";
        // Set the statement and execute the statment
        $statement = $connection->prepare($sql);
        $statement->execute($newuser);
        
        // get the result
        //$result = $statement->fetchAll();

        //print_r($result);
        include('index.php');
	} catch(PDOException $error) {
        // if there is an error, tell us what it is
		echo $sql . "<br>" . $error->getMessage();
   
    }
    
} else {
    // set the values for the field   
    //header("Location:register.php"); 
    //exit; // 
    $error = "user not created";
    include('register.php');
}
?>