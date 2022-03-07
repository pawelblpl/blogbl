<?php 
class UserContr extends User {

    public function getUsernameSession() {
        $this->getUserName();
    }

    public function checkUser($username, $userpassword){
        if(!empty($username) && !empty($userpassword)) {
            $passwordverify = password_verify($userpassword, $this->getUserPassword());
            if($username == $this->getUsername() && $passwordverify == true) {
                return true;
            }
            else {
                echo "<p class='red'>Dane nie są prawidłowe!</p>";
                return false;
            }
        } 
        elseif(empty($username)) {
            echo "<p class='red'>Uzupełnij nazwę użytkownika!</p>";
            return false;
        }
        elseif(empty($userpassword)) {
            echo "<p class='red'>Uzupełnij hasło!</p>";
            return false;
        }
    }

    public function changePassword($oldpassword, $userpassword, $newpasswordrpt) {
        $this->changeP($oldpassword, $userpassword, $newpasswordrpt);
    }
}
?>