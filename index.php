<?php
require './before.php';
?>
<div class="container bg-light text-black" style="border:1px solid #cecece">
    <div style="text-align:center; margin-top: 10px; margin-bottom: 10px">
        <h1>...</h1></div>
    <div class="row">
        <div class="col-2 bg-light"></div>
        <div class="col-8 bg-light" style="text-align: center">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
        <div class="col-2 bg-light"></div>
    </div>
    <br/>
</div>

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