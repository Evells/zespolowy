<?php
session_start();

$con = mysqli_connect('localhost', 'root', 'qwerty');

mysqli_select_db($con, 'muzycy');

$idNadawcy = $_SESSION['login']['id'];
$idOdbiorcy = $_POST['user'];
$temat = $_POST['temat'];
$text = $_POST['tresc'];
$time = time();

$sql = "INSERT INTO `mail` (`user1`, `user2`, `message`, `time`, `subject`) VALUES ($idNadawcy, $idOdbiorcy, '$text', $time, '$temat')";
mysqli_query($con, $sql);

$_SESSION['new_message'] = true;
header("location: mail.php");