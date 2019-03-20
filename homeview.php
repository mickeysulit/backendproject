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
       // $result = $statement->fetchAll();
        echo "<form>";
        echo "<table border='1'><tr><th>activity</th><th></th></tr>";

        while ($row = $statement->fetch(PDO::FETCH_NUM)) {
            echo "<tr>";
            echo "<td>" . $row[2] . "</td>";
            echo "<td><input type='radio' name='q1' value=".$row[0]."/></td>";
            echo "</tr>";            
            //echo "<p>$row[0] $row[1] $row[2] </p>";
        }
        echo "</table>";
        echo "</form>";
	} catch(PDOException $error) {
        // if there is an error, tell us what it is
		echo $sql . "<br>" . $error->getMessage();
	}	
 ?>