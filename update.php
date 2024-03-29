<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();

require 'mysql.php';

$id = $_POST['todoid'];
$activity = trim($_POST['activity']);
$description = trim($_POST['description']);
try {

        if ($activity <> '') {
            $conn = new PDO($mydsn, $myusrnme, $mypsswrd, $options);
    
            //get the data from the form
            $newtodo = array( 
                "todoid" => $id, 
                "activity" => $activity,
                "description" => $description,
            );
		
            $sql = "UPDATE `todo` 
                SET activity = :activity, 
                    description = :description 
                WHERE todoid = :todoid";
 
            $statement = $conn->prepare($sql);
            $statement->execute($newtodo);
            $activity = '';
            $description = '';
            include('homeview.php');
        } else {
            include('editview.php');
        }
        
        // get the result
        //$result = $statement->fetchAll();

        //print_r($result);
} catch(PDOException $error) {
  include('editview.php');
   
}
?>