<?php
require 'mysql.php';

echo session_status();
//echo PHP_SESSION_NONE;
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    echo session_status();
    if($_SESSION['username']==NULL){
    //haven't log in
        echo "You haven't log in";
        $_SESSION['username'] = 'mickey';
    }else{
    //Logged in
        echo "Successfully log in!";
        $_SESSION['username'] = NULL;
    }
} else {
    echo "In Session";
}


//phpinfo();
try {
        // use this command to connect to the database
        $connection = new PDO($mydsn, $myusrnme, $mypsswrd, $options);
		
        // Put the command sting to be executed mysql
        $sql = "SELECT * FROM users";
        // Set the statement and execute the statment
        $statement = $connection->prepare($sql);
        $statement->execute();
        
        // get the result
        $result = $statement->fetchAll();

    print_r($result);
	} catch(PDOException $error) {
        // if there is an error, tell us what it is
		echo $sql . "<br>" . $error->getMessage();
	}	
 
?>