<?php 
include 'includes/head.inc.php';
?>
<div class="menu">
    <div class="menu-logo">
        <?php 
            $logo = new Logo();
            $logo->showLogo();
        ?>
    </div>
    <div class="menu-nav">
        <a class="menu-nav-link" href="index.php">Home</a>
        <a class="menu-nav-link" href="">Portfolio</a>
        <a class="menu-nav-link" href="contact.php">Kontakt</a>
    </div>
</div>
<div class="main">
    <?php 
    $portfolio = new Portfolio();
    $portfolio->showAllPortfolio();
    ?>
</div>
<?php 
include 'includes/footer.inc.php';
?>