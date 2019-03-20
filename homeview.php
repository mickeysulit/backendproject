<?php
//phpinfo();
try {
        // use this command to connect to the database
        $connection = new PDO($mydsn, $myusrnme, $mypsswrd, $options);
		
        // Put the command sting to be executed mysql
        $sql = "SELECT * FROM todo";
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