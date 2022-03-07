<?php 
class DbhContr extends Dbh {

    public function createDb($dbhost, $dbusername, $dbname, $dbpassword, $username, $userpassword) {
        $this->create($dbhost, $dbusername, $dbname, $dbpassword, $username, $userpassword);
    }
}
?>