<?php 
include '../includes/headadmin.inc.php';
?>
<div class="panel">
    <div class="panel-menu">
        <a class="panel-menu-link" href="../index.php">Strona główna</a>
        <a class="panel-menu-link" href="addarticle.php">Dodaj wpis</a>
        <a class="panel-menu-link" href="listarticle.php">Lista wpisów</a>
        <a class="panel-menu-link" href="addportfolio.php">Dodaj portfolio</a>
        <a class="panel-menu-link" href="listportfolio.php">Lista portfolio</a>
        <a class="panel-menu-link active" href="">Edytuj kontakt</a>
        <a class="panel-menu-link" href="changelogo.php">Zmień logo</a>
        <a class="panel-menu-link" href="changepassword.php">Zmień hasło</a>
        <a class="panel-menu-link" href="../logout.php">Wyloguj się</a>
    </div>
    <div class="panel-content">
        <div class="panel-content-title"><h2>Edytowanie kontaktu</h2></div>
        <div class="panel-content-content">
            <form class="panel-form" action="editcontact.php" method="post" id="form">
                <textarea class="panel-textarea" name="contact" form="form" placeholder="Treść..."><?php $contact = new ContactView(); $contact->showContact();?></textarea>
                <input class="login-submit" type="submit" value="Zapisz">
            </form>
            <?php 
            if(isset($_POST['contact'])) {
                $con = $_POST['contact'];
                if(!empty($con)) {
                    $contactcontr = new ContactContr();
                    $contactcontr->editContact($con);
                }
                else {
                    echo "<p class='red'>Wpisz treść</p>";
                }
            }
            ?>
        </div>
    </div>
</div>