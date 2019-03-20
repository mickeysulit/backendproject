<?php
require 'mysql.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $activity = $_GET["activity"];
    $description = $_GET["description"];
}
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
        echo "<table border='1'><tr><th>activity</th><th>Description</th><th></th></tr>";

        while ($row = $statement->fetch(PDO::FETCH_NUM)) {
            echo "<tr>";
            echo "<td>" . $row[2] . "</td>";
            echo "<td>" . $row[3] . "</td>";
            echo "<td><a href='delete.php?id=".$row[0]."'>delete</a>&nbsp";
            echo "<a href='editview.php?id=".$row[0]."&activity=".$row[2]."&description=".$row[3]."'>edit</a> </td>";
            //echo "<td><input type='radio' name='q1' value=".$row[0]."/></td>";
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
  <form method="post" action="update.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Activity</label>
  	  <input type="text" name="activity" value="<?php echo $activity; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Description</label>
  	  <input type="text" name="description" value="<?php echo $description; ?>">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="add_todo">update</button>
  	</div>
</form>