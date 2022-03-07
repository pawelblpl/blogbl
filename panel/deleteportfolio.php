<?php 
include '../includes/headadmin.inc.php';
if(isset($_POST['portfolio'])) {
    $file = $_POST['portfolio'];
    unlink($file);
    header('Location: listportfolio.php');
    exit();
}
else {
    header('Location: listportfolio.php');
    exit();
}