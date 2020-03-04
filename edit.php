<?php
require 'after_login.php';

if (isset($_POST["submit"])) {
    $target_dir = "./obrazki/";
    $target_file = $target_dir . $_SESSION['login']['id'] . ".png";
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;

        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

        $con = mysqli_connect('localhost', 'root', 'qwerty');
        mysqli_select_db($con, 'muzycy');
        $reg = "UPDATE `users` SET `avatar` = '" . $_SESSION['login']['id'] . "' WHERE id = " . $_SESSION['login']['id'] . " ";
        mysqli_query($con, $reg);
        $_SESSION['login']['avatar'] = $_SESSION['login']['id'];
    } else {
//        echo "File is not an image.";
        $uploadOk = 0;
    }
}

?>

<div class="container bg-light text-black" style="border:1px solid #cecece">
    <div style="text-align:center">
        <br/>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-2">
            <?php
            if ($_SESSION['login']['avatar'] == 0) {
                echo '<img class="border border-secondary p-1" src="https://via.placeholder.com/150" alt="" />';
                echo '
                    <form action="edit.php" method="post" enctype="multipart/form-data">
                    <div class="p-1">
                        <input type="file" name="fileToUpload" id="fileToUpload">
                    </div>
                    <div class="p-1">
                        <input type="submit" value="Dodaj Avatar" name="submit">
                    </div>
                    </form>';
            } else {
                echo '<img style="width: 150px; height:150px;" class="border border-secondary p-1" src="./obrazki/' . $_SESSION['login']['id'] . '.png" alt="" />';


        echo '</div>
        <div class="col-2">
            <br/><br/> ';
            echo '
            <form action="edit.php" method="post" enctype="multipart/form-data">
                <div class="p-1">
                    <input type="file" name="fileToUpload" id="fileToUpload">
                </div>
                <div class="p-1">
                    <input type="submit" value="Zmien obrazek" name="submit">
                </div>
            </form>';
            }
            ?>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-2 bg-light"></div>
        <div class="col-8 bg-light" style="text-align: center">
            <form action="update.php" method="POST">
                <div class="form-group">
                    <label for="name">Imie: </label>
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $_SESSION['login']['name'] ?>" pattern="[A-Za-z]{3,}" title="Co najmniej 3, lub więcej znaków">
                </div>
                <div class="form-group">
                    <label for="surname">Nazwisko: </label>
                    <input type="text" name="surname" id="surname" class="form-control" value="<?php echo $_SESSION['login']['surname'] ?>" pattern="[A-Za-ząćęłńóśźż]{3,}" title="Co najmniej 3, lub więcej znaków">
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
                    <input type="text" name="city" id="city" class="form-control" value="<?php echo $_SESSION['login']['city'] ?>" pattern="[A-ZĄĘŁŃÓŚŹŻa-ząćęłńóśźż]{2,}" title="Co najmniej 2, lub więcej znaków">
                </div>
                <div class="form-group">
                    <label for="postcode">Kod pocztowy (np 00-000): </label>
                    <input type="text" name="postcode" id="postcode" class="form-control" value="<?php echo $_SESSION['login']['postcode'] ?>" pattern="[0-9]{2}-[0-9]{3}" >
                </div>
                    <div class="form-group">
                        <label for="musicgenre">Typ muzyki, jaki Cię interesuje: </label>
                        <select class="form-control" name="musicgenre" id="musicgenre">
                            <option value="Pop">Pop</option>
                            <option value="Rock">Rock</option>
                            <option value="House">House</option>
                            <option value="Muzyka filmowa">Muzyka filmowa</option>
                            <option value="Rap">Rap</option>
                            <option value="Muzyka klasyczna">Muzyka klasyczna</option>
                            <option value="R&B">R&B</option>
                            <option value="Blues">Blues</option>
                            <option value="Metal">Metal</option>
                        </select>
                    </div>
                <div class="form-group">
                    <label for="language">Jęzki, które znasz: </label>
                    <input type="text" name="language" id="language" class="form-control" value="<?php echo $_SESSION['login']['language'] ?>" pattern="[A-Za-z]{3,}" title="Co najmniej 3, lub więcej znaków">
                </div>
                <div class="form-group mb-4">
                    <label for="description">Coś o tobie: </label>
                    <textarea class="form-control" name="description" rows="5"><?php echo $_SESSION['login']['description']; ?></textarea>
                </div>
                <div class="form-group mx-sm-3 mb-4">
                        Krótka instrukcja obsługi:
                        <br/>
                        < i ><i>twój tekst</i>< /i >  pochyły
                        <br/>
                        < b > <b>twój tekst</b> < /b > pogrubiony
                        <br/>
                        < br/ > koniec linii
                </div>
                <button class="btn btn-primary">Zapisz</button>
                <br/><br/>
            </form>
        </div>
    </div>
</div>
<br/>