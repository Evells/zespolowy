<?php
require './after_login.php';

$id = $_GET['id'];
$zapytanie = "SELECT * FROM `users` WHERE `id` = $id";
$wynik = mysqli_fetch_array(mysqli_query($connection, $zapytanie));
?>

<div class="container bg-light text-black" style="border: 1px solid #cecece">
    <div class="row">
        <div class="col-4" style="text-align: center">
            <br/>
            <?php
            if ($wynik['avatar'] == 0) {
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
            <?php echo $wynik['name'] ?>
            <hr>
            <?php echo $wynik['surname'] ?>
            <hr>
            <?php echo $wynik['musicgenre'] ?>
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
            <?php echo $wynik['city'] ?>
            <hr>
            <?php
            $w=$wynik['bdate'];
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
    <?php echo $wynik['description']; ?>
    <br/>
</div>