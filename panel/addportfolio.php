<?php 
include '../includes/headadmin.inc.php';
?>
<div class="panel">
    <div class="panel-menu">
        <a class="panel-menu-link" href="../index.php">Strona główna</a>
        <a class="panel-menu-link" href="addarticle.php">Dodaj wpis</a>
        <a class="panel-menu-link" href="listarticle.php">Lista wpisów</a>
        <a class="panel-menu-link active" href="">Dodaj portfolio</a>
        <a class="panel-menu-link" href="listportfolio.php">Lista portfolio</a>
        <a class="panel-menu-link" href="editcontact.php">Edytuj kontakt</a>
        <a class="panel-menu-link" href="changelogo.php">Zmień logo</a>
        <a class="panel-menu-link" href="changepassword.php">Zmień hasło</a>
        <a class="panel-menu-link" href="../logout.php">Wyloguj się</a>
    </div>
    <div class="panel-content">
        <div class="panel-content-title"><h2>Dodawanie portfolio</h2></div>
        <div class="panel-content-content">
            <form class="panel-form" action="addportfolio.php" method="post" enctype="multipart/form-data">
                <input class="upload-img" type="file" name="file">
                <input class="login-submit" type="submit" value="Dodaj zdjęcie" name="submit">
            </form>
            <?php
            if(isset($_POST['submit'])) {
                $portfolio = new Portfolio();
                $portfolio->addportfolio();
            }
            ?>
        </div>
    </div>
</div>