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
      
         $sql = "SELECT usersid, fname FROM users where username = :username and password = :password ";
        
         $statement = $connection->prepare($sql);
         $statement->execute($user_info);
         
         while ($row = $statement->fetch(PDO::FETCH_NUM)) {
            $_SESSION['username'] = $username;
            $_SESSION['usersid'] = $row[0];
            $_SESSION['fname'] = $row[1];
             
         }
        if ( $_SESSION['username'] ==$username ){
            include('homeview.php');           
        } else {
            include('index.php');
        }

    } catch(PDOException $error) {
        
    }
} else {
    include('index.php');
}

?>
