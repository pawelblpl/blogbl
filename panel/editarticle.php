<?php 
include '../includes/headadmin.inc.php';
if(isset($_POST['id2']) && isset($_POST['newtitle']) && isset($_POST['newcontent'])) {
    $newtitle = $_POST['newtitle'];
    $newcontent = $_POST['newcontent'];
    $id = $_POST['id2'];
    if(!empty($newtitle) && !empty($newcontent)) {
        $article = new ArticleContr();
        $article->editArticle($id, $newtitle, $newcontent);
        header('Location: listarticle.php');
        exit();
    }
    elseif(empty($newtitle)) {
        echo "<p class='red'>Uzupełnij nowy tytuł</p>";
    }
    elseif(empty($newcontent)) {
        echo "<p class='red'>Uzupełnij nową treść</p>";
    }
}
?>