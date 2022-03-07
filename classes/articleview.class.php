<?php 
class ArticleView extends Article {

    public function showAllArticles() {
        $stmt = $this->getAll();
        while($row = $stmt->fetch()) {
            echo '
            <div class="box">
                <div class="box-title"><h3>'.$row['title'].'</h3></div>
                <div class="box-content">'.$row['content'].'</div>
                <div class="box-date">'.$row['date'].'</div>
            </div>
            ';
        }
    }

    public function showAllEditArticles() {
        $stmt = $this->getAllEdit();
        while($row = $stmt->fetch()) {
            echo '
            <div class="box">
                <div class="box-title"><h3>'.$row['title'].'</h3></div>
                <div class="box-content article-form">
                    <form action="deletearticle.php" method="post">
                        <input type="hidden" name="id" value="'.$row['id'].'">
                        <input class="article-input-delete" type="submit" value="Usuń">
                    </form>
                    <form class="article-form" action="editonearticle.php" method="post">
                        <input type="hidden" name="id" value="'.$row['id'].'">
                        <input class="login-submit" type="submit" value="Edytuj">
                    </form>
                </div>
                <div class="box-date">'.$row['date'].'</div>
            </div>
            ';
        }
    }

    public function showOneEditArticle($id) {
        $result = $this->getOneEdit($id);
        echo '
        <div class="panel-content-title"><h2>Edytowanie wpisu pt. '.$result['title'].'</h2></div>
        <div class="panel-content-content">
            <form class="panel-form" action="editarticle.php" method="post" id="form">
                <input type="hidden" name="id2" value="'.$result['id'].'">
                <input class="panel-input" type="text" name="newtitle" value="'.$result['title'].'" placeholder="Tytuł wpisu">
                <textarea class="panel-textarea" name="newcontent" form="form" placeholder="Treść...">'.$result['content'].'</textarea>
                <input class="login-submit" type="submit" value="Zapisz">
            </form>
        </div>';
    }
}
?>