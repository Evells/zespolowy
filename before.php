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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">M</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Strona główna</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Odnośniki
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="">odośnik1</a>
                    <a class="dropdown-item" href="">odnośnik2</a>
                    <a class="dropdown-item" href="">odnośnik3</a>
                    <a class="dropdown-item" href="">odnośnik4</a>
            </li>
        </ul>

        <button type="button" class="btn btn-dark mr-2" data-toggle="modal" data-target=".bd-example-modal-lg">
            Rejestracja
        </button>

        <button type="button" class="btn btn-dark" data-toggle="modal" data-target=".logowanie">
            Logowanie
        </button>
    </div>

    <!-- Modal 1 -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Rejestracja</h5>
                </div>
                <div class="modal-body">
                    <form action="rejestracja.php" method="POST">
                        <div class="form-group">
                            <label for="login">Login</label>
                            <input name="login" id="login" class="form-control" placeholder="Podaj login" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Hasło</label>
                            <input type="password" id="password" name="password" class="form-control"
                                   placeholder="Twoje tajne hasło" pattern=".{6,}"
                                   title="Hasło musi mieć 6 lub więcej znaków" required>
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
                    <form action="logowanie.php" method="POST">
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