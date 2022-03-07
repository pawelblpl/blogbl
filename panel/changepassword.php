<?php 
include '../includes/headadmin.inc.php';
?>
<div class="panel">
    <div class="panel-menu">
        <a class="panel-menu-link" href="../index.php">Strona główna</a>
        <a class="panel-menu-link" href="addarticle.php">Dodaj wpis</a>
        <a class="panel-menu-link" href="listarticle.php">Lista wpisów</a>
        <a class="panel-menu-link" href="addportfolio.php">Dodaj portfolio</a>
        <a class="panel-menu-link" href="listportfolio.php">Lista portfolio</a>
        <a class="panel-menu-link" href="editcontact.php">Edytuj kontakt</a>
        <a class="panel-menu-link" href="changelogo.php">Zmień logo</a>
        <a class="panel-menu-link active" href="">Zmień hasło</a>
        <a class="panel-menu-link" href="../logout.php">Wyloguj się</a>
    </div>
    <div class="panel-content">
        <div class="panel-content-title"><h2>Zmiana hasła</h2></div>
        <div class="panel-content-content">
            <form class="panel-form" action="changepassword.php" method="post" enctype="multipart/form-data">
                <input class="panel-input" type="password" name="oldpassword" placeholder="Stare hasło">
                <input class="panel-input" type="password" name="newpassword" placeholder="Nowe hasło">
                <input class="panel-input" type="password" name="newpasswordrpt" placeholder="Powtórz nowe hasło">
                <input class="login-submit" type="submit" value="Zmień hasło" name="submit">
            </form>
            <?php
            if(isset($_POST['oldpassword']) && isset($_POST['newpassword']) && isset($_POST['newpasswordrpt'])) {
                $oldpassword = $_POST['oldpassword'];
                $newpassword = $_POST['newpassword'];
                $newpasswordrpt = $_POST['newpasswordrpt'];
                $user = new UserContr();
                $user->changePassword($oldpassword, $newpassword, $newpasswordrpt);
            }
            ?>
        </div>
    </div>
</div>