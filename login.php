<?php
include 'includes/head.inc.php';
if(isset($_SESSION['user'])){
    header('Location: index.php');
    exit();
}
?>
<div class="main">
    <div class="box">
        <form class="login-form" action="login.php" method="post">
            <h3>Dane do logowania</h3>
            <input class="login-input" type="text" name="username" placeholder="Login">
            <input class="login-input" type="password" name="userpassword" placeholder="Hasło">
            <input class="login-submit" type="submit" value="Zaloguj się">
        </form>
        <?php 
        if(isset($_POST['username']) && isset($_POST['userpassword'])) {
            $username = $_POST['username'];
            $userpassword = $_POST['userpassword'];

            $user = new UserContr();
            if($user->checkUser($username, $userpassword) == true){
                $_SESSION['user'] = $username;
                header('Location: index.php');
                exit();
            }
        }
        ?>
    </div>
</div>