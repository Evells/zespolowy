<?php
session_start();

$con = mysqli_connect('localhost', 'root', 'qwerty');

mysqli_select_db($con, 'muzycy');

$login = $_POST['login'];
$pass = $_POST['password'];


$s = "select * from `users` where login = '$login'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1)
{
    header('location: error.php');
}
else
{
    $reg ="INSERT INTO `users` (`login`, `password`, `name`, `surname`, `bdate`, `email`, `phone`, `city`, `postcode`, `adress`, `musicgenre`, `avatar`, `description`) VALUES ('$login', '$pass', NULL, '', '', '', '', '', '', '', '', '0', '')";
    mysqli_query($con, $reg);

    $_SESSION['register'] = true;
    header('location: index.php');
}
?>