<?php
require "after_login.php";

$zapytanie = ("SELECT id, name, surname, avatar, musicgenre, city FROM users");
$wynik = mysqli_query($connection, $zapytanie);
?>

<div class="container bg-light text-black" style="border:1px solid #cecece">
    <br/>

    <div class="row">
        <div class="col-lg-12">
            <?php
            foreach (mysqli_fetch_all($wynik) as $key => $uzytkownik) {
                if ($uzytkownik[2] != NULL && $uzytkownik[0]!=$_SESSION['login']['id']) {
                    if ($uzytkownik[3] == 0) {
                        $avatar = '<img class="border border-secondary p-1" src="https://via.placeholder.com/150" alt="" />';
                    } else {
                        $avatar = '<img style="width: 150px; height:150px;" class="border border-secondary p-1" src="./obrazki/' . $uzytkownik[0] . '.png" alt="" />';
                    }

                    echo '<div class="">
                '. $avatar .'
                <a href="profil.php?id=' . $uzytkownik[0] . '">' . $uzytkownik[1] . ' ' . $uzytkownik[2] . '</a>
               
            </div>
            <hr/>';
                }
            }
            ?>
        </div>
    </div>
</div>
