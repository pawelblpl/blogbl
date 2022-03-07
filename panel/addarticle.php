<?php 
include '../includes/headadmin.inc.php';
?>
<div class="panel">
    <div class="panel-menu">
        <a class="panel-menu-link" href="../index.php">Strona główna</a>
        <a class="panel-menu-link active" href="">Dodaj wpis</a>
        <a class="panel-menu-link" href="listarticle.php">Lista wpisów</a>
        <a class="panel-menu-link" href="addportfolio.php">Dodaj portfolio</a>
        <a class="panel-menu-link" href="listportfolio.php">Lista portfolio</a>
        <a class="panel-menu-link" href="editcontact.php">Edytuj kontakt</a>
        <a class="panel-menu-link" href="changelogo.php">Zmień logo</a>
        <a class="panel-menu-link" href="changepassword.php">Zmień hasło</a>
        <a class="panel-menu-link" href="../logout.php">Wyloguj się</a>
    </div>
    <div class="panel-content">
        <div class="panel-content-title"><h2>Dodawanie wpisu</h2></div>
        <div class="panel-content-content">
            <form class="panel-form" action="addarticle.php" method="post" id="form">
                <input class="panel-input" type="text" name="title" placeholder="Tytuł wpisu">
                <textarea class="panel-textarea" name="content" form="form" placeholder="Treść..."></textarea>
                <input class="login-submit" type="submit" value="Dodaj Wpis">
            </form>
            <?php 
            if(isset($_POST['title']) && isset($_POST['content'])) {
                $title = $_POST['title'];
                $content = $_POST['content'];
                
                $article = new ArticleContr();
                $article->createArticle($title, $content);
            }
            ?>
        </div>
    </div>
</div>