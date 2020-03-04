<?php
session_start();

$con = mysqli_connect('localhost', 'root', 'qwerty');

mysqli_select_db($con, 'muzycy');

$idUser = $_SESSION['login']['id'];
$temat = $_POST['temat'];
$text = $_POST['tresc'];
$time = time();

$sql = "INSERT INTO `announcement` (`id_user`, `title`, `time`, `content`) VALUES ($idUser, '$temat', $time, '$text')";
mysqli_query($con, $sql);

$_SESSION['new_announcement'] = true;
header("location: announcement.php");