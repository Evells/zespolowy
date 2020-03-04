<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('location: index.php');
}

$connection = mysqli_connect('localhost', 'root', 'qwerty');
mysqli_select_db($connection, 'muzycy');
mysqli_set_charset($connection, "utf8");



$w = $_SESSION['login']['bdate'];
$rok = intval(substr($w, 0, 4));
$mies = intval(substr($w, 5, 2));
$dzien = intval(substr($w, 8, 2));

$arok = intval(date("Y"));
$amies = intval(date("m"));
$adzien = intval(date("d"));

if (($mies == $amies) && ($dzien < $adzien)) {
    $wiek = $arok - $rok - 1;
}
if (($mies == $amies) && ($dzien > $adzien)) {
    $wiek = $arok - $rok;
}
if (($mies == $amies) && ($dzien == $adzien)) {
    $wiek = "Masz urodziny!";
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

    <title>Muzyczna wyszukiwarka</title>
</head>
<body style="background-color:#e9e9e9">
<nav class="navbar navbar-dark bg-dark justify-content-between">
    <a class="navbar-brand" href="home.php">M</a>
    <form class="form-inline">
        <a href="announcement.php" class="btn btn-dark btn-lg active" role="button" aria-pressed="true">Ogłoszenia</a>
        <a href="all_users.php" class="btn btn-dark btn-lg active" role="button" aria-pressed="true">Wszyscy użytkownicy</a>
        <a href="mail_sendout.php" class="btn btn-dark btn-lg active" role="button" aria-pressed="true">Wysłane
            wiadomości</a>
        <a href="mail.php" class="btn btn-dark btn-lg active" role="button" aria-pressed="true">Poczta</a>
        <a href="my_profile.php" class="btn btn-dark btn-lg active" role="button" aria-pressed="true">Twój profil</a>
        <a href="edit.php" class="btn btn-dark btn-lg active" role="button" aria-pressed="true">Edytuj profil</a>
        <a href="logout.php" class="btn btn-dark btn-lg active" role="button" aria-pressed="true">Wyloguj</a>
    </form>

</nav>

<?php
if (isset($_SESSION['new_message']) && $_SESSION['new_message'] == true) {
    ?>
    <div class="alert alert-dark alert-dismissible fade show" role="alert">
        <strong>Wysłano wiadomość!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
    $_SESSION['new_message'] = false;
}
?>

<?php
if (isset($_SESSION['new_announcement']) && $_SESSION['new_announcement'] == true) {
    ?>
    <div class="alert alert-dark alert-dismissible fade show" role="alert">
        <strong>Dodano ogłoszenie!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
    $_SESSION['new_announcement'] = false;
}
?>

</br> </br>

</body>
</html>