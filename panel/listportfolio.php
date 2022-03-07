<?php 
include '../includes/headadmin.inc.php';
?>
<div class="panel">
    <div class="panel-menu">
        <a class="panel-menu-link" href="../index.php">Strona główna</a>
        <a class="panel-menu-link" href="addarticle.php">Dodaj wpis</a>
        <a class="panel-menu-link" href="listarticle.php">Lista wpisów</a>
        <a class="panel-menu-link" href="addportfolio.php">Dodaj portfolio</a>
        <a class="panel-menu-link active" href="">Lista portfolio</a>
        <a class="panel-menu-link" href="editcontact.php">Edytuj kontakt</a>
        <a class="panel-menu-link" href="changelogo.php">Zmień logo</a>
        <a class="panel-menu-link" href="changepassword.php">Zmień hasło</a>
        <a class="panel-menu-link" href="../logout.php">Wyloguj się</a>
    </div>
    <div class="panel-content">
        <div class="panel-content-title"><h2>Lista portfolio</h2></div>
        <div class="panel-content-content">
            <div class="articles">
            <?php
            $portfolio = new Portfolio();
            $portfolio->showAllEditPortfolio();
            ?>
            </div>
        </div>
    </div>
</div>