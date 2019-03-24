<?php
require 'mysql.php';

//echo session_status();
//echo PHP_SESSION_NONE;
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if(isset($_SESSION['username']) && !empty($_SESSION['username']))  {
    include('homeview.php');
} else {
    include('loginview.php');
}

?>