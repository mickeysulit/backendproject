
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();

echo "Hi " .$_SESSION['fname']. "!!";
echo "  <a  href='logout.php'.>logout</a>";

if(isset($_SESSION['activity']) && !empty($_SESSION['activity']))  {
    $activity = $_SESSION['activity'];
} else {
    $activity = '';
}
if(isset($_SESSION['description']) && !empty($_SESSION['description']))  {
    $description = $_SESSION['description'];
} else {
    $description = '';
}

try {
        // use this command to connect to the database
        $connection = new PDO($mydsn, $myusrnme, $mypsswrd, $options);
		
        // Put the command sting to be executed mysql
        $sql = "SELECT * FROM todo where userid = ".$_SESSION['usersid'];
        // Set the statement and execute the statment
        $statement = $connection->prepare($sql);
        $statement->execute();
        
        // get the result
       // $result = $statement->fetchAll();
        echo "<form>";
        echo "<table border='0'><tr><th>activity</th><th>Description</th><th></th></tr>";

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
	}	
 ?>
  <form method="post" action="addtodo.php">
  	<div class="input-group">
  	  <label>Activity</label>
  	  <input type="text" name="activity" value="<?php echo $activity; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Description</label>
  	  <input type="text" name="description" value="<?php echo $description; ?>">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="add_todo">add</button>
  	</div>
</form>
</body>
</html>