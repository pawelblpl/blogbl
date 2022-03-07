<?php
class Contact extends Dbh {

    protected function getContact() {
        $sql = "SELECT * FROM contact";
        $stmt = $this->connect()->query($sql);
        return $stmt;
    }

    protected function getCountContact() {
        $sql = "SELECT count(*) FROM contact";
        $stmt = $this->connect()->query($sql);
        return $stmt;
    }

    protected function edit($contact) {
        $stmt = $this->getCountContact();
        if($stmt->fetchColumn() == 0) {
            $sql = "INSERT INTO contact (contact) VALUES (?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$contact]);
            echo "Gratulację. Prawidłowo edytowałeś podstronę kontaktu.";
        }
        else {
            $sql = "UPDATE contact SET contact = :contact";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindparam(':contact', $contact);
            $stmt->execute();
            echo "Gratulację. Prawidłowo edytowałeś podstronę kontaktu.";
        }
    }
}
?>