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

require 'mysql.php';


echo "Hi " .$_SESSION['fname']. "!!";
echo "  <a  href='logout.php'.>logout</a>";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $activity = $_GET["activity"];
    $description = $_GET["description"];
}

try {
        $conn = new PDO($mydsn, $myusrnme, $mypsswrd, $options);
		
        $sql = "SELECT * FROM todo where userid = ".$_SESSION['usersid'];
        $statement = $conn->prepare($sql);
        $statement->execute();
        
        echo "<form>";
        echo "<table border='0'><tr><th>To Do</th><th>Due Date</th><th></th></tr>";

        while ($row = $statement->fetch(PDO::FETCH_NUM)) {
            echo "<tr>";
            echo "<td>" . $row[2] . "</td>";
            echo "<td>" . $row[3] . "</td>";
            echo "<td><a href='delete.php?id=".$row[0]."'>delete</a>&nbsp";
            echo "<a href='editview.php?id=".$row[0]."&activity=".$row[2]."&description=".$row[3]."'>edit</a> </td>";
            echo "</tr>";            
        }
        echo "</table>";
        echo "</form>";
	} catch(PDOException $error) {
 	}	
 ?>
  <form method="post" action="update.php">
  	<div class="input-group">
      <input type="hidden" name="todoid" value="<?php echo $id; ?>">
  	  <label>To Do</label>
  	  <input type="text" name="activity" value="<?php echo $activity; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Due Date</label>
  	  <input type="text" name="description" value="<?php echo $description; ?>">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="add_todo">update</button>
  	</div>
</form>
</body>
</html>