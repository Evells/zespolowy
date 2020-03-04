<?php

date_default_timezone_set('Europe/Warsaw');
$connection = mysqli_connect('localhost', 'root', 'qwerty');

require './after_login.php';
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="display-4">Wiadomości wysłane</h1>
            <p class="lead">
                <?php
                if (isset($_GET['odczytaj_wlasny'])) {
                    echo '<a href=\'mail_sendout.php\'>Powrót do wysłanych</a>';
                }
                ?>
            </p>
        </div>
    </div>
</div>
</br>
<div class='container'>
    <?php

    $id = $_SESSION['login']['id'];
    $zapytanie = "SELECT mail.time, users.login, mail.id, mail.subject, mail.user1, mail.user2 FROM mail INNER JOIN users ON mail.user1 = users.id WHERE mail.user1 = $id";
    $wynik = mysqli_query($connection, $zapytanie);

    if (!isset($_GET['odczytaj_wlasny'])) {
        echo "
    <table class=\"table\">
  <thead>
    <tr>
      <th scope=\"col\">#</th>
      <th scope=\"col\">Temat</th>
      <th scope=\"col\">Data</th>
      <th scope=\"col\">Odbiorca</th>
    </tr>
  </thead>
  <tbody>";
        foreach (mysqli_fetch_all($wynik) as $key => $wiadomosc) {
                $zap = "SELECT users.name, users.surname FROM users INNER JOIN mail ON mail.user2 WHERE users.id= $wiadomosc[5] ";
                $wyn = mysqli_fetch_array(mysqli_query($connection, $zap));

                ?>
                <tr>
                    <th scope="row"><?php echo $key + 1; ?></th>
                    <td><?php echo "<a href='mail_sendout.php?odczytaj_wlasny=$wiadomosc[2]'>$wiadomosc[3]</a>"; ?></td>
                    <td><?php echo date("G:i d-m-Y ", $wiadomosc[0]); ?></td>
                    <td><?php echo "<a href='profil.php?id=$wiadomosc[5]'>" . $wyn['name'] . " " . $wyn['surname'] . "</a>"; ?></td>
                </tr>
                <?php
            }
    }
    echo "</tbody>
</table>";
    if (isset($_GET['odczytaj_wlasny'])) {
        $id = $_GET['odczytaj_wlasny'];
        //Pobieram login nadawcy, temat wiadomości oraz jej zawartość
        $zapytanie = "SELECT users.name, mail.subject, mail.message FROM mail INNER JOIN users ON mail.user1 = users.id WHERE mail.id = $id";
        $wynik = mysqli_fetch_array(mysqli_query($connection, $zapytanie));
        echo "Temat: " . $wynik['subject'] . "<br/><br/>"; ?>
        Treść:
        <br/>
        <?php
        echo nl2br($wynik['message']);
    }
    ?>
</div>;