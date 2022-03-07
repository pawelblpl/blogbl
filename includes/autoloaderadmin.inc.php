<?php 
spl_autoload_register('myAutoLoader');
function myAutoLoader($class_name) {
    $class_name = strtolower($class_name);
    $path = "../classes/{$class_name}.class.php";
    if (file_exists($path)) {
        require_once($path);
    } 
    else {
        die("Nie znaleziono pliku {$class_name}.class.php");
    }
}
?>