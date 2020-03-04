<?php
session_start();

if (isset($_SESSION['login'])) {
    header('location: home.php');
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
        <a class="navbar-brand">M</a>
        <form class="form-inline">
            <button type="button" class="btn btn-dark my-2 my-sm-0" data-toggle="modal" data-target=".bd-example-modal-lg">
                Rejestracja
            </button>
            <button type="button" class="btn btn-dark" data-toggle="modal" data-target=".logowanie">
                Logowanie
            </button>
        </form>
    </nav>
    <!-- Modal 1 -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Rejestracja</h5>
                </div>
                <div class="modal-body">
                    <form action="registration.php" method="POST">
                        <div class="form-group">
                            <label for="login">Login</label>
                            <input name="login" id="login" class="form-control" placeholder="Podaj login" required pattern=".{3,}">
                        </div>
                        <div class="form-group">
                            <label for="password">Hasło</label>
                            <input type="password" id="password" name="password" class="form-control"
                                   placeholder="Twoje tajne hasło" pattern=".{6,}"
                                   title="Hasło musi mieć 6 lub więcej znaków" required>
                        </div>
                        <div class="form-group">
                            <label for="login">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Podaj e-mail" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Zamknij</button>
                    <button class="btn btn-primary">Zarejestruj</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 2 -->
    <div class="modal fade logowanie" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Logowanie</h5>
                </div>
                <div class="modal-body">
                    <form action="login.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="login" placeholder="Login" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="exampleInputPassword1"
                                   placeholder="Hasło">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Zamknij</button>
                    <button class="btn btn-primary">Zaloguj</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>

<?php
if (isset($_SESSION['register']) && $_SESSION['register'] == true) {
    ?>
    <div class="alert alert-dark alert-dismissible fade show" role="alert">
        <strong>Dodano nowego użytkownika</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
    $_SESSION['register'] = false;
}
?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
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