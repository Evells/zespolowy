<?php
session_start();

$con = mysqli_connect('localhost', 'root', 'qwerty');

mysqli_select_db($con, 'muzycy');
mysqli_set_charset($con,"utf8");

$login = $_POST['login'];
$pass = $_POST['password'];

$s = "select * from users where login = '$login' && password = '$pass'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1)
{
    $login = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $_SESSION['login'] = $login[0];
    header('location: home.php');
}
else
{
    header('location: error.php');
}
?>