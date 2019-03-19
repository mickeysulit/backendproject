<?php
require 'mysql.php';

//phpinfo();


try {
        // FIRST: Connect to the database
        $connection = new PDO($mydsn, $myusrnme, $mypsswrd, $options);
		
        // SECOND: Create the SQL 
        $sql = "SELECT * FROM users";
        // THIRD: Prepare the SQL
        $statement = $connection->prepare($sql);
        $statement->execute();
        
        // FOURTH: Put it into a $result object that we can access in the page
        $result = $statement->fetchAll();

    print_r($result);
	} catch(PDOException $error) {
        // if there is an error, tell us what it is
		echo $sql . "<br>" . $error->getMessage();
	}	
 
?>