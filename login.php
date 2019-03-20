<?php 
if (session_status() == PHP_SESSION_NONE)
    session_start();

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
      
         $sql = "SELECT usersid FROM users where username = :username and password = :password ";
        
         $statement = $connection->prepare($sql);
         $statement->execute($user_info);
        
         $result = $statement->fetchAll();
        
        if ($statement->rowCount() > 0) 
        {
            echo "save session";
            $_SESSION['username'] = $username;
            $_SESSION['usersid'] = 1;
        }
 
         echo $statement->rowCount();
        include('homeview.php');
    } catch(PDOException $error) {
        
    }
}

?>
