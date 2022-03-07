<?php 

class Dbh {
    
    protected function create($dbhost, $dbusername, $dbname, $dbpassword, $username, $userpassword) {
        try {
            $pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $config = '<?php $db = array("dbhost" => "'.$dbhost.'", "dbusername" => "'.$dbusername.'", "dbname" => "'.$dbname.'", "dbpassword" => "'.$dbpassword.'"); ?>';
            mkdir('./config', 0777, true);
            $file = fopen("./config/config.php","wb");
            fwrite($file, $config);
            fclose($file);
            require './config/config.php';
            $sql = "CREATE TABLE articles(id INT AUTO_INCREMENT PRIMARY KEY NOT NULL, title TEXT, content TEXT, date TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP); CREATE TABLE contact (id INT AUTO_INCREMENT PRIMARY KEY NOT NULL, contact TEXT); CREATE TABLE user (id INT AUTO_INCREMENT PRIMARY KEY NOT NULL, username TEXT, userpassword TEXT)";
            $pdo = new PDO("mysql:host=".$db['dbhost'].";dbname=".$db['dbname']."", $db['dbusername'], $db['dbpassword']);
            $pdo->exec($sql);
            $sql2 = "INSERT INTO user (username, userpassword) VALUES (?, ?)";
            $hashuserpassword = password_hash($userpassword, PASSWORD_DEFAULT);
            $stmt2 = $this->connect()->prepare($sql2);
            $stmt2->execute([$username, $hashuserpassword]);
            header('Location: index.php');
            exit();
        } catch(PDOException $e) {
            echo "<p class='red'>Błąd połączenia z bazą danych</p>";
            die();
        }
    }

    protected function connect() {
        if(file_exists('./config/config.php')){
            include './config/config.php';
            $pdo = new PDO("mysql:host=".$db['dbhost'].";dbname=".$db['dbname']."", $db['dbusername'], $db['dbpassword']);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        }
        elseif(file_exists('../config/config.php')) {
            include '../config/config.php';
            $pdo = new PDO("mysql:host=".$db['dbhost'].";dbname=".$db['dbname']."", $db['dbusername'], $db['dbpassword']);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo; 
        }
    }
}
?>