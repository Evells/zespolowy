<?php
session_start();

$con = mysqli_connect('localhost', 'root', 'qwerty');

mysqli_select_db($con, 'muzycy');
mysqli_set_charset($con,"utf8");


$id = $_SESSION['login']['id'];
$name = $_POST['name'];
$sur = $_POST['surname'];
$bday = $_POST['bdate'];
$mail = $_POST['email'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$pcode = $_POST['postcode'];
$adress = $_POST['adress'];
$music = $_POST['musicgenre'];

$reg = "UPDATE `users` SET name='$name', surname='$sur', bdate='$bday', email='$mail', phone='$phone', city='$city', postcode='$pcode', adress='$adress', musicgenre='$music', avatar='0', description='' WHERE id=$id";

mysqli_query($con,$reg);

if($reg!==NULL) {
    header('location: home.php');
}

?>