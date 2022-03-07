<?php 
class User extends Dbh{

    protected function getUsername() {
        $stmt = $this->connect()->query("SELECT * FROM user");
        while ($row = $stmt->fetch()) {
            return $row['username'];
        }
    }

    protected function getUserpassword() {
        $stmt = $this->connect()->query("SELECT * FROM user");
        while ($row = $stmt->fetch()) {
            return $row['userpassword'];
        }
    }

    protected function changeP($oldpassword, $userpassword, $newpasswordrpt){
        $oldpasswordverify = password_verify($oldpassword, $this->getUserpassword());
        $userpasswordverify = password_verify($userpassword, $this->getUserpassword());
        if(!empty($oldpassword) && !empty($userpassword) && !empty($newpasswordrpt)) {
            if($oldpasswordverify == true) {
                if($userpasswordverify == false) {
                    if($userpassword == $newpasswordrpt){
                        $sql = "UPDATE user SET userpassword = :userpassword WHERE id = 1";
                        $stmt = $this->connect()->prepare($sql);
                        $userpasswordhash = password_hash($userpassword, PASSWORD_DEFAULT);
                        $stmt->bindValue(':userpassword', $userpasswordhash);
                        $stmt->execute();
                        echo "Gratulację poprawnie zmieniłeś swoje hasło.";
                    }
                    else {
                        echo "<p class='red'>Nowe hasła nie są takie same.</p>";
                    }
                }
                else {
                    echo "<p class='red'>Nowe hasło jest takie samo jak stare.</p>";
                }
            }
            else {
                echo "<p class='red'>Stare hasło nie jest prawidłowe.</p>";
            }
        }
        else {
            echo "<p class='red'>Uzupełnij wszystkie pola.</p>";
        }
    }
}
?>