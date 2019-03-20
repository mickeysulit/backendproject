<?php
require 'mysql.php';

$todoid = $_POST['todoid'];
$activity = trim($_POST['activity']);
$description = trim($_POST['description']);
try {

        // use this command to connect to the database
        $connection = new PDO($mydsn, $myusrnme, $mypsswrd, $options);
    
        //get the data from the form
        $newtodo = array( 
            "todoid" => $todoid, 
            "activity" => $activity,
            "description" => $description,
        );
		
        // Put the command sting to be executed mysql
        $sql = "UPDATE `todo` 
                SET activity = :activity, 
                    description = :description 
                WHERE todoid = :todoid";
        // Set the statement and execute the statment
        $statement = $connection->prepare($sql);
        $statement->execute($newtodo);
        $activity = '';
        $description = '';
        include('homeview.php');
        
        // get the result
        //$result = $statement->fetchAll();

        //print_r($result);
} catch(PDOException $error) {
        // if there is an error, tell us what it is
		echo $sql . "<br>" . $error->getMessage();
}
?>