<?php
require 'after_login.php';

?>
<div class="container bg-light text-black" style="border: 1px solid #cecece">
    <div class="row">
        <div class="col-4" style="text-align: center">
            <br/>
            <?php
            if ($_SESSION['login']['avatar'] == 0) {
                echo '<img class="border border-secondary p-1" src="https://via.placeholder.com/150" alt="" />';
            } else {
                echo '<img style="width: 150px; height:150px;" class="border border-secondary p-1" src="./obrazki/' . $_SESSION['login']['id'] . '.png" alt="" />';
            }
            ?>
            <br/>
        </div>
        <div class="col-2" style="text-align: right">
            <br/><br/>
            Imię:
            <hr>
            Nazwisko:
            <hr>
            Rodzaj muzyki:
            <hr>
        </div>
        <div class="col-2">
            <br/><br/>
            <?php echo $_SESSION['login']['name'] ?>
            <hr>
            <?php echo $_SESSION['login']['surname'] ?>
            <hr>
            <?php echo $_SESSION['login']['musicgenre'] ?>
            <hr>
        </div>
        <div class="col-2" style="text-align: right">
            <br/><br/>
            Miejscowość:
            <hr>
            Wiek:
            <hr>
        </div>
        <div class="col-2">
            <br/><br/>
            <?php echo $_SESSION['login']['city'] ?>
            <hr>
            <?php
            $w=$_SESSION['login']['bdate'];
            $rok=intval(substr($w, 0, 4));
            $mies=intval(substr($w, 5, 2));
            $dzien=intval(substr($w, 8, 2));

            $arok=intval(date("Y"));
            $amies=intval(date("m"));
            $adzien=intval(date("d"));

            if($mies>$amies){
                echo $arok-$rok-1;
            }
            if($mies<$amies){
                echo $arok-$rok;
            }
            if(($mies==$amies) && ($dzien<$adzien)){
                echo $arok-$rok;
            }
            if(($mies==$amies)&&($dzien>$adzien)){
                echo $arok-$rok-1;
            }
            if(($mies==$amies)&&($dzien==$adzien)) {
                echo "Masz urodziny!";
            }
            ?>
            <hr>
        </div>
    </div>
    <br/>
</div>

<div class="container bg-light text-black" style="border: 1px solid #cecece">
    <?php echo $_SESSION['login']['description']; ?>
    <br/>
</div>