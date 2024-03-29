
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

// Set up session variables 
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
        //connect to the db mysql
        $conn = new PDO($mydsn, $myusrnme, $mypsswrd, $options);
		// create the sql with userid 
        $sql = "SELECT * FROM todo where userid = ".$_SESSION['usersid'];
        
        $statement = $conn->prepare($sql);
        $statement->execute();
        
        echo "<form>";
        echo "<table border='0'><tr><th>To Do</th><th>Due Date</th><th></th></tr>";
        //iterate through the return from the call
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
  	  <label>To Do</label>
  	  <input type="text" name="activity" value="<?php echo $activity; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Due Date</label>
  	  <input type="text" name="description" value="<?php echo $description; ?>">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="add_todo">add</button>
  	</div>
</form>
</body>
</html>