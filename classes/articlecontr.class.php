<?php 
class ArticleContr extends Article {

    public function createArticle($title, $content) {
        $this->createA($title, $content);
    }

    public function deleteArticle($id) {
        $this->delete($id);
    }

    public function searchArticle($id) {
        $this->getOneEdit($id);
    }

    public function editArticle($id, $title, $content) {
        $this->edit($id, $title, $content);
    }
}
?>