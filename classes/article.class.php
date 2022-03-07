<?php
class Article extends Dbh {

    protected function createA($title, $content) {
        if(!empty($title) && !empty($content)) {
            $sql = "INSERT INTO articles (title, content) VALUES (?, ?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$title, $content]);
            echo "Gratulację dodałeś nowy wpis!";
        }
        elseif(empty($title)) {
            echo "<p class='red'>Wpisz tytuł</p>";
        }
        elseif(empty($content)) {
            echo "<p class='red'>Wpisz treść</p>";
        }
    }

    protected function getAll() {
        $sql = "SELECT * FROM articles ORDER BY date DESC";
        $stmt = $this->connect()->query($sql);
        return $stmt;
    }

    protected function getAllEdit() {
        $sql = "SELECT * FROM articles ORDER BY date DESC";
        $stmt = $this->connect()->query($sql);
        return $stmt;
    }

    protected function getOneEdit($id) {
        $sql = "SELECT * FROM articles WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindparam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }

    protected function delete($id) {
        $sql = "DELETE FROM articles WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    protected function edit($id, $title, $content) {
        $sql = "UPDATE articles SET title = :title, content = :content WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindparam(':id', $id, PDO::PARAM_INT);
        $stmt->bindparam(':title', $title);
        $stmt->bindparam(':content', $content);
        $stmt->execute();
    }
}