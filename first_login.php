<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('location: index.php');
}

$con = mysqli_connect('localhost', 'root', 'qwerty');
mysqli_select_db($con, 'muzycy');

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
                    <label for="name">Imię*: </label>
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $_SESSION['login']['name'] ?>" required pattern="[A-Za-z]{3,}" title="2 lub więcej znaków">

                    <label for="name">Nazwisko*: </label>
                    <input type="text" name="surname" id="surname" class="form-control" value="<?php echo $_SESSION['login']['surname'] ?>" required pattern="[A-Za-z]{3,}" title="2 lub więcej znaków">

                    <label for="bdate">Data urodzenia*: </label>
                    <input type="date" id="bdate" class="form-control" name="bdate" <?php echo $_SESSION['login']['bdate'] ?> max="2009-01-02" required>

                    <label for="phone">Numer telefonu (np 784154263): </label>
                    <input name="phone" id="phone" class="form-control" value="<?php echo $_SESSION['login']['phone'] ?>" pattern="[0-9]{9}">

                    <label for="city">Miasto*: </label>
                    <input type="text" name="city" id="city" class="form-control" value="<?php echo $_SESSION['login']['city'] ?>" required pattern="[A-Za-z]{2,}" title="Co najmniej 2, lub więcej znaków">

                    <label for="postcode">Kod pocztowy (np 00-000)*: </label>
                    <input type="text" name="postcode" id="postcode" class="form-control" value="<?php echo $_SESSION['login']['postcode'] ?>" pattern="[0-9]{2}-[0-9]{3}" required>

                    <label for="musicgenre">Typ muzyki, jaki Cię interesuje: </label>
                    <select class="form-control" name="musicgenre" id="musicgenre">
                        <option value="1">Pop</option>
                        <option value="2">Rock</option>
                        <option value="3">House</option>
                        <option value="4">Muzyka filmowa</option>
                        <option value="5">Rap</option>
                        <option value="6">Muzyka klasyczna</option>
                        <option value="7">R&B</option>
                        <option value="8">Blues</option>
                        <option value="9">Metal</option>
                    </select>
                </div>
                <button class="btn btn-primary">Zapisz</button>
                <br/><br/>
            </form>
            * Dane wymagane.

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

