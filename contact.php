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
        <a class="menu-nav-link" href="portfolio.php">Portfolio</a>
        <a class="menu-nav-link" href="">Kontakt</a>
    </div>
</div>
<div class="main">
    <div class="box box-contact">
        <div class="box-title"><h2>Kontakt<h2></div>
        <div class="box-content box-content-contact">
            <?php 
                $contact = new ContactView();
                $contact->showContact();
            ?>
        </div>
    </div>
</div>
<?php 
include 'includes/footer.inc.php';
?>