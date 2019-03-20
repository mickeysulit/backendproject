<?php
require 'mysql.php';

if (isset($_GET["id"])) {
    try {
       $connection = new PDO($mydsn, $myusrnme, $mypsswrd, $options);
       $id = $_GET["id"];
       $sql = "DELETE FROM todo WHERE todoid = :id";
       $statement = $connection->prepare($sql);
       // bind the id to the PDO
       $statement->bindValue(':id', $id);
            
       // execute the statement
       $statement->execute();
       include('homeview.php');
    } catch(PDOException $error) {
            // if there is an error, tell us what it is
    }
}
?>