<?php 

require('mysql.php');

$username = trim($_POST['username']);
$password = trim($_POST['password']);


if (($password <> '') && (isset($_POST['login_user']))) 
{
    try {
        $connection = new PDO($mydsn, $myusrnme, $mypsswrd, $options);
        
        $user_info = array( 
            "username" => $username, 
            "password" => $password,
        );
      
         $sql = "SELECT * FROM users where username = :username and password = :password ";
        
         $statement = $connection->prepare($sql);
         $statement->execute($user_info);
        
         $result = $statement->fetchAll();
 
         print_r($result);
    } catch(PDOException $error) {
        
    }
}

?>
