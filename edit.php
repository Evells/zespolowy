<?php
require 'after.php';

?>

<div class="container bg-light text-black" style="border:1px solid #cecece">
    <div style="text-align:center">
        <br/>
    </div>
    <div class="row">
        <div class="col-2 bg-light"></div>
        <div class="col-8 bg-light" style="text-align: center">

            Dokonaj zmian, jakich chcesz :)
            <form action="update.php" method="POST">
                <div class="form-group">
                    <label for="name">Imie: </label>
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $_SESSION['login']['name'] ?>" pattern="[A-Za-z]{3,}" title="Co najmniej 3, lub więcej znaków">
                </div>
                <div class="form-group">
                    <label for="surname">Nazwisko: </label>
                    <input type="text" name="surname" id="surname" class="form-control" value="<?php echo $_SESSION['login']['surname'] ?>" pattern="[A-Za-z]{3,}" title="Co najmniej 3, lub więcej znaków">
                </div>
                <div class="form-group">
                    <label for="bdate">Data urodzenia: </label>
                    <input type="text" name="bdate" class="form-control" placeholder="<?php echo $_SESSION['login']['bdate'] ?>"
                           onfocus="(this.type='date')"
                           onblur="(this.type='text')"
                           max="2009-01-02">
                </div>
                <div class="form-group">
                    <label for="surname">E-mail: </label>
                    <input type="text" name="email" id="email" class="form-control" value="<?php echo $_SESSION['login']['email'] ?>">
                </div>
                <div class="form-group">
                    <label for="phone">Numer telefonu (np 784154263): </label>
                    <input name="phone" id="phone" class="form-control" value="<?php echo $_SESSION['login']['phone'] ?>" pattern="[0-9]{9}">
                </div>
                <div class="form-group">
                    <label for="city">Miasto: </label>
                    <input type="text" name="city" id="city" class="form-control" value="<?php echo $_SESSION['login']['city'] ?>" pattern="[A-Za-z]{2,}" title="Co najmniej 2, lub więcej znaków">
                </div>
                <div class="form-group">
                    <label for="postcode">Kod pocztowy (np 00-000): </label>
                    <input type="text" name="postcode" id="postcode" class="form-control" value="<?php echo $_SESSION['login']['postcode'] ?>" pattern="[0-9]{2}-[0-9]{3}" >
                </div>
                    <div class="form-group">
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
                <div class="form-group">
                    <label for="language">Jęzki, które znasz: </label>
                    <input type="text" name="language" id="language" class="form-control" value="<?php echo $_SESSION['login']['language'] ?>" pattern="[A-Za-z]{3,}" title="Co najmniej 3, lub więcej znaków">
                </div>
                <button class="btn btn-primary">Zapisz</button>
                <br/><br/>
            </form>

        </div>
    </div>

    <div class="col-2 bg-light"></div>
    <br/>
</body>
</html>