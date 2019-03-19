<?php
require 'mysql.php';

echo session_status();
//echo PHP_SESSION_NONE;
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    echo session_status();
    if($_SESSION['username']==NULL){
    //haven't log in
        echo "You haven't log in";
        $_SESSION['username'] = 'mickey';
    }else{
    //Logged in
        echo "Successfully log in!";
        $_SESSION['username'] = NULL;
    }
} else {
    echo "In Session";
}

if( $_SESSION['username'] != NULL)
{
    // found out I can include another file and show this to the browser
     include('loginview.php');
} else {
     include('homeview.php');
}

?>