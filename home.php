<?php
require 'after.php';
session_start();

if (!isset($_SESSION['login'])) {
    header('location: index.php');
}

$con = mysqli_connect('localhost', 'root', 'qwerty');
mysqli_select_db($con, 'muzycy');

if($_SESSION['login']['name']===NULL){
    header('location: first_login.php');
}
?>