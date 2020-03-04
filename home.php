<?php
require 'after_login.php';

if($_SESSION['login']['name']===NULL || $_SESSION['login']['name']===''){
    header('location: first_login.php');
}
?>