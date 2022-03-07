<?php 
if(file_exists('config/config.php')) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/styles/style.css">
    <title>Document</title>
</head>
<body>
<div class="main">
    <div class="box">
        <form class="login-form" action="install.php" method="post">
            <h3>Dane do bazy danych</h3>
            <input class="login-input" type="text" name="dbhost" placeholder="Host">
            <input class="login-input" type="text" name="dbusername" placeholder="Nazwa użytkownika">
            <input class="login-input" type="text" name="dbname" placeholder="Nazwa bazy danych">
            <input class="login-input" type="password" name="dbpassword" placeholder="Hasło">
            <h3>Dane do panelu admina</h3>
            <input class="login-input" type="text" name="username" placeholder="Login">
            <input class="login-input" type="password" name="userpassword" placeholder="Hasło">
            <input class="login-input" type="password" name="userpasswordrpt" placeholder="Powtórz hasło">
            <input class="login-submit" type="submit" value="Stwórz Bloga">
        </form>
        <?php
        include 'classes/dbh.class.php';
        include 'classes/dbhcontr.class.php';
        if(isset($_POST['dbhost']) && isset($_POST['dbusername']) && isset($_POST['dbname']) && isset($_POST['dbpassword']) && isset($_POST['username']) && isset($_POST['userpassword']) && isset($_POST['userpasswordrpt'])) {
            $dbhost = $_POST['dbhost'];
            $dbusername = $_POST['dbusername'];
            $dbname = $_POST['dbname'];
            $dbpassword = $_POST['dbpassword'];

            $username = $_POST['username'];
            $userpassword = $_POST['userpassword'];
            $userpasswordrpt = $_POST['userpasswordrpt'];

            if(!empty($dbhost) && !empty($dbusername)&& !empty($dbname) && !empty($username) && !empty($userpassword) && !empty($userpasswordrpt)) {
                if($userpassword == $userpasswordrpt) {
                    $dbh = new DbhContr();
                    $dbh->createDb($dbhost, $dbusername, $dbname, $dbpassword, $username, $userpassword);
                }
                else {
                    echo "<p class='red'>Hasła nie tą takie same.</p>";
                }
            }
            elseif(empty($dbhost)) {
                echo "<p class='red'>Uzupełnij hosta.</p>";
            }
            elseif(empty($dbusername)) {
                echo "<p class='red'>Uzupełnij nazwę użytkownika</p>";
            }
            elseif(empty($dbname)) {
                echo "<p class='red'>Uzupełnij nazwę bazy danych</p>";
            }
            elseif(empty($username)) {
                echo "<p class='red'>Uzupełnij nazwę użytkownika</p>";
            }
            elseif(empty($userpassword)) {
                echo "<p class='red'>Uzupełnij hasło</p>";
            }
            elseif(empty($userpasswordrpt)) {
                echo "<p class='red'>Powtórz hasło</p>";
            }
        }
        ?>
    </div>
</div>