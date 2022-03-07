<?php 
include '../includes/headadmin.inc.php';
?>
<div class="panel">
    <div class="panel-menu">
        <a class="panel-menu-link" href="../index.php">Strona główna</a>
        <a class="panel-menu-link" href="addarticle.php">Dodaj Wpis</a>
        <a class="panel-menu-link active" href="">Lista wpisów</a>
        <a class="panel-menu-link" href="addportfolio.php">Dodaj portfolio</a>
        <a class="panel-menu-link" href="listportfolio.php">Lista portfolio</a>
        <a class="panel-menu-link" href="editcontact.php">Edytuj kontakt</a>
        <a class="panel-menu-link" href="changelogo.php">Zmień logo</a>
        <a class="panel-menu-link" href="changepassword.php">Zmień hasło</a>
        <a class="panel-menu-link" href="../logout.php">Wyloguj się</a>
    </div>
    <div class="panel-content">
        <?php
        if(!isset($_POST['id'])){
            header('Location: listarticle.php');
            exit();
        }
        else{
            $article = new ArticleView();
            $article->showOneEditArticle($_POST['id']);
        }
        ?>
    </div>
</div>