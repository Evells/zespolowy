<?php
session_start();

if (isset($_SESSION['login'])) {
    header('location: home.php');
}
?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/bootstrap.css" crossorigin="anonymous">

</head>
<body style="background-color:#e9e9e9">
<nav class="navbar navbar-dark bg-dark justify-content-between">
    <a class="navbar-brand">M</a>
</nav>
<br/>
</body>
</html>