<?php
require 'mysql.php';

echo "password" . $_POST['password_1'];
echo "password 2" . $_POST['password_2'];

if ($_POST['password_1'] == $_POST['password_2']) 
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
	} catch(PDOException $error) {
        // if there is an error, tell us what it is
		echo $sql . "<br>" . $error->getMessage();
   
    }
    
} else {
    include register.php;
}
?>