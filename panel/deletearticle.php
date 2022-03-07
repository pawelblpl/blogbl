<?php 
include '../includes/headadmin.inc.php';
if(isset($_POST['id'])) {
    $article = new ArticleContr();
    $article->deleteArticle($_POST['id']);
    header('Location: listarticle.php');
    exit();
}
else {
    header('Location: listarticle.php');
    exit();
}