<?php
session_start();
//czyścimy dane sesji
$_SESSION['login'] = NULL;
//niszczymy sesję
session_destroy();
header('location: index.php');
?>