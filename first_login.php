<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('location: index.php');
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

    <title>Za pierwszym razem boli zawsze tak samo, hehehe :v</title>
</head>
<body style="background-color:#e9e9e9">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Fandom</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>

<br/>

<div class="container bg-light text-black" style="border:1px solid #cecece">
    <div style="text-align:center">
        <br/>
    </div>
    <div class="row">
        <div class="col-2 bg-light"></div>
        <div class="col-8 bg-light" style="text-align: center">

            Zanim przedziesz do dalszej części strony, uzupełnij swoje dane:
            <form action="update.php" method="POST">
                <div class="form-group">
                    <label for="name">Twoje imię: </label>
                    <input name="name" id="name" class="form-control" placeholder="Jan" required>
                </div>
                <div class="form-group">
                    <label for="surname">Nazwisko: </label>
                    <input name="surname" id="surname" class="form-control" placeholder="Kowalski" required>
                </div>
                <div class="form-group">
                    <label for="bdate">Data urodzenia: </label>
                    <input type="date" id="bdate" class="form-control" name="bdate" required>
                </div>
                <div class="form-group">
                    <label for="email">Twój e-mail(jeśli tylko zechesz się nim z nami podzielić): </label>
                    <input name="email" id="email" class="form-control" placeholder="twojpieknymail@cośtam.jakiśkraj">
                </div>
                <div class="form-group">
                    <label for="phone">Numer telefonu (opcjonalnie, ale zawsze łatwiej się skontaktować): </label>
                    <input name="phone" id="phone" class="form-control" placeholder="666?">
                </div>
                <div class="form-group">
                    <label for="city">Miasto, w którym obecnie kocujesz: </label>
                    <input name="city" id="city" class="form-control" placeholder="Łódź" required>
                </div>
                <div class="form-group">
                    <label for="postcode">Kod pocztowy (jeżeli nie znasz, wpisz 00-000, bądź cokolwiek innego, i tak przejdzie): </label>
                    <input name="postcode" id="postcode" class="form-control" placeholder="00-000" required>
                </div>
                <div class="form-group">
                    <label for="adress">Reszta adresu (zakładamy że mieszkasz na jakieś ulicy/w jakieś wsi):  </label>
                    <input name="adress" id="adress" class="form-control" placeholder="ulica, numer budynku">
                </div>
                <div class="form-group">
                    <label for="musicgenre">Typ muzyki, jaki Cię interesuje: </label>
                    <input name="musicgenre" id="musicgenre" class="form-control" placeholder="k-pop też się tu znajdzie!" required>
                </div>
                <button class="btn btn-primary">Zarejestruj</button>
                <br/><br/>
            </form>

    </div>
</div>

<div class="col-2 bg-light"></div>
<br/>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>

