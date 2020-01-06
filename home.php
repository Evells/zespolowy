<?php
require 'after.php';

$con = mysqli_connect('localhost', 'root', 'qwerty');
mysqli_select_db($con, 'muzycy');

if($_SESSION['login']['name']===NULL || $_SESSION['login']['name']===''){
    header('location: first_login.php');
}
?>