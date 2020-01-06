<?php
require 'after.php';
?>

<div class="container bg-light text-black" style="border:1px solid #cecece">
    <div style="text-align:center">
        <br/>
    </div>
    <div class="row">
        <div class="col-4 bg-light"></div>
        <div class="col-3 bg-light" style="text-align: center">

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="name">Imię:</label>
            <br>
            <label for="surname">Nazwisko:</label>
        </div>
    </div>
        </div>
        <div class="col-3 bg-light" style="text-align: center">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name"><?php echo $_SESSION['login']['name'] ?> </label>
                </div>
                <div class="form-group col-md-6">
                    <label for="surname"><?php echo $_SESSION['login']['surname'] ?></label>
                </div>
    </div>
