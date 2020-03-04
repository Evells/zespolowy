<?php

date_default_timezone_set('Europe/Warsaw');
$connection = mysqli_connect('localhost', 'root', 'qwerty');

require './after_login.php';
?>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="display-4">Ogłoszenia</h1>
                    <p class="lead">
                        <?php if (isset($_GET['dodaj'])) {
                            //Jeśli piszemy ogloszenie wyświetl tylko link do odczytania
                            echo '<a href=\'announcement.php\'>Powrót do ogłoszeń</a>';
                        } else {
                            //Jeśli odczytujemy ogloszenie wyświetl oba linki
                            if(isset($_GET['odczytaj'])){
                                echo '<a href=\'?dodaj\'>Zgłoś się</a> | <a href=\'announcement.php\'>Powrót do ogłoszeń</a>';
                            }
                            //Jeśli tylko patrzymy na listę wiadomości wyświetlamy opcję wysyłania
                            else {
                                echo '<a href=\'?dodaj\'>Nowe ogłoszenie</a>';
                            }
                        } ?>
                    </p>
                </div>
            </div>
        </div>
    <div class='container'>
<?php

if (isset($_GET['dodaj'])) {
    echo "<form method='POST' action='new_announcement.php'>";
    echo "Temat ogłoszenia";
    echo "<input class=\"form-control\" name='temat' required>";
    echo "<br/>Treść<br/>";
    echo "<textarea name='tresc' class=\"form-control\" rows=\"3\" required></textarea><br/>";
    echo "<button type=\"submit\" class=\"btn btn-dark\">Dodaj</button>";
    echo "</form>";
}
else {
    if (!isset($_GET['odczytaj'])){
        $id = $_SESSION['login']['id'];
    $zapytanie = "SELECT announcement.id, announcement.id_user, announcement.time, announcement.title FROM announcement INNER JOIN users ON announcement.id_user = users.id";
    $wynik = mysqli_query($connection, $zapytanie);

    echo "
    <table class=\"table\">
  <thead>
    <tr>
      <th scope=\"col\">#</th>
      <th scope=\"col\">Temat</th>
      <th scope=\"col\">Data</th>
      <th scope=\"col\">Osoba ogłaszająca</th>
    </tr>
  </thead>
  <tbody>";
    foreach (mysqli_fetch_all($wynik) as $key=>$wiadomosc) {
        $zap = "SELECT users.name, users.surname FROM users INNER JOIN announcement ON announcement.id_user WHERE users.id= $wiadomosc[1] ";
        $wyn = mysqli_fetch_array(mysqli_query($connection, $zap));

        ?>
    <tr>
      <th scope="row"><?php echo $key+1; ?></th>
      <td><?php echo "<a href='announcement.php?odczytaj=$wiadomosc[0]'>$wiadomosc[3]</a>"; ?></td>
      <td><?php echo date("G:i d-m-Y ", $wiadomosc[2]); ?></td>
      <td><?php echo "<a href='profil.php?id=$wiadomosc[1]'>" . $wyn['name'] . " " . $wyn['surname'] . "</a>"; ?></td>
    </tr>
        <?php
        //Konczę pętle
    }
    echo "</tbody>
</table>";
    }
    else {
        $id = $_GET['odczytaj'];
        //Pobieram login nadawcy, temat wiadomości oraz jej zawartość
        $zapytanie = "SELECT users.name, announcement.title, announcement.content, users.id, users.surname FROM announcement INNER JOIN users ON announcement.id_user = users.id WHERE announcement.id = $id";
        $wynik = mysqli_fetch_array(mysqli_query($connection, $zapytanie));
        echo "Ogłoszenie ";
        echo "<a href='profil.php?id=".$wynik['id']."'> ".$wynik['name']." ".$wynik['surname']." </a>"; ?>
        <br/>
        <?php echo "Temat ogłoszenia: ".$wynik['title']." " ?>
        <br/><br/>
        <?php echo "Treść:<br/>";
        echo nl2br($wynik['content']);
    }
}


echo "</div>";