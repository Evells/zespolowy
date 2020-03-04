<?php

date_default_timezone_set('Europe/Warsaw');
$connection = mysqli_connect('localhost', 'root', 'qwerty');

require './after_login.php';
?>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="display-4">Poczta</h1>
                    <p class="lead">
                        <?php if (isset($_GET['wyslij'])) {
                            //Jeśli piszemy wiadomość wyświetl tylko link do odczytania
                            echo '<a href=\'mail.php\'>Powrót do poczty</a>';
                        } else {
                            //Jeśli odczytujemy wiadomość wyświetl oba linki
                            if(isset($_GET['odczytaj'])){
                                echo '<a href=\'?wyslij\'>Odpowiedz</a> | <a href=\'mail.php\'>Powrót do poczty</a>';
                            }
                            //Jeśli tylko patrzymy na listę wiadomości wyświetlamy opcję wysyłania
                            else {
                                echo '<a href=\'?wyslij\'>Nowa wiadomość</a>';
                            }
                        } ?>
                    </p>
                </div>
            </div>
        </div>
    <div class='container'>
<?php

if (isset($_GET['wyslij'])) {

    //Wybieram loginy i id użytkownikow
    $zapytanie = "select name, surname, id from users";
    $wynik = mysqli_query($connection, $zapytanie);

    echo "<form method='POST' action='new_message.php'>";
    echo "Wyślij do<br/>";
    echo "<select name='user' class=\"form-control\">";

    //Tablice z wszystkimi uzytkownikami przekazuje do petli foreach ktora wyswietli cala zawartosc tablicy
    // [0] name (dodatkowo sprawdzamy czy aby przypadkiem nie jest nullem, jesli tak - nie wypisujemy +
    // czy nie wysylami wiadomosci samym sobie) [1] surname, [2] id
    foreach (mysqli_fetch_all($wynik) as $uzytkownik) {
         if($uzytkownik[0] != NULL && $uzytkownik[2]!=$_SESSION['login']['id'])
         {
            echo "<option value=\"$uzytkownik[2]\">$uzytkownik[0] $uzytkownik[1]</option>";
        }
    }
    echo "</select><br/>";
    echo "Temat wiadomości";
    echo "<input class=\"form-control\" name='temat' required>";
    echo "<br/>Treść<br/>";
    echo "<textarea name='tresc' class=\"form-control\" rows=\"3\" required></textarea><br/>";
    echo "<button type=\"submit\" class=\"btn btn-dark\">Wyślij</button>";
    echo "</form>";

}
else {
    if (!isset($_GET['odczytaj'])){
        $id = $_SESSION['login']['id'];
    $zapytanie = "SELECT mail.time, mail.read, users.name, mail.id, mail.subject, mail.user1, users.surname FROM mail INNER JOIN users ON mail.user1 = users.id WHERE mail.user2 = $id";
    $wynik = mysqli_query($connection, $zapytanie);

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
    foreach (mysqli_fetch_all($wynik) as $key=>$wiadomosc) {
        if ($wiadomosc[1] == 0) {
            $odczytana = "<span style='color: red;'>Nowa</span>";
        }
        else {
            $odczytana = "";
        }
        ?>
    <tr>
      <th scope="row"><?php echo $key+1; ?></th>
      <td><?php echo "<a href='mail.php?odczytaj=$wiadomosc[3]'>$wiadomosc[4] $odczytana</a>"; ?></td>
      <td><?php echo date("G:i d-m-Y ", $wiadomosc[0]); ?></td>
      <td><?php echo "<a href='profil.php?id=$wiadomosc[5]'>$wiadomosc[2] $wiadomosc[6]</a>"; ?></td>
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
        $zapytanie = "SELECT users.name, mail.subject, mail.message FROM mail INNER JOIN users ON mail.user1 = users.id WHERE mail.id = $id";
        $wynik = mysqli_fetch_array(mysqli_query($connection, $zapytanie));
        echo "Wiadomość od: ".$wynik['name']." <br/> Temat: ".$wynik['subject']."<br/><br/>"; ?>
        Treść:
        <br/>
        <?php
        echo nl2br($wynik['message']);

        //Ustawiam wiadomość jako odczytaną
        $sql = "UPDATE `mail` SET `read` = 1 WHERE id = $id";
        mysqli_query($connection, $sql);
    }
}


echo "</div>";