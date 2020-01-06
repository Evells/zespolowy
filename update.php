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
$music = $_POST['musicgenre'];
$lang = $_POST['language'];

$s = "select * from `users` where login = '$login'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1) {
    header('location: error.php');
}
else {
    if($name===''){
        $name=$_SESSION['login']['name'];
    }
    else
        $_SESSION['login']['name']=$name;

    if($sur===''){
        $sur=$_SESSION['login']['surname'];
    }
    else
        $_SESSION['login']['surname']=$sur;

    if($bday===''){
        $bday=$_SESSION['login']['bdate'];
    }
    else
        $_SESSION['login']['bdate']=$bday;

    if(($mail==='') || ($mail===NULL)){
        $mail=$_SESSION['login']['email'];
    }
    else
        $_SESSION['login']['email']=$mail;

    if($phone===''){
        $phone=$_SESSION['login']['phone'];
    }
    else
        $_SESSION['login']['phone']=$phone;

    if($city===''){
        $city=$_SESSION['login']['city'];
    }
    else
        $_SESSION['login']['city']=$city;

    if($pcode===''){
        $pcode=$_SESSION['login']['postcode'];
    }
    else
        $_SESSION['login']['postcode']=$pcode;

    if($music===''){
        $music=$_SESSION['login']['musicgenre'];
    }
    else
        $_SESSION['login']['musicgenre']=$music;

    if($lang===''){
        $lang=$_SESSION['login']['language'];
    }
    else
        $_SESSION['login']['language']=$lang;


    $reg = "UPDATE `users` SET name='$name', surname='$sur', bdate='$bday', email='$mail', phone='$phone', city='$city', postcode='$pcode', musicgenre='$music', avatar='0', description='', language='$lang' WHERE id=$id";
    mysqli_query($con, $reg);
}
if($name!==NULL) {
    header('location: edit.php');
}

?>