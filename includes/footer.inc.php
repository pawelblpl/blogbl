<div class="footer">
    <div class="footer-content">
    <?php
    if(empty($_SESSION['user'])){
        echo '<a class="footer-user-link" href="login.php">Zaloguj się</a>';
    }
    else{
        echo '<a class="footer-user-link" href="panel/index.php">Panel admina</a>';
        echo '<a class="footer-user-link" href="logout.php">Wyloguj się</a>';
    }
    ?>
    </div>
</div>
</body>
</html>