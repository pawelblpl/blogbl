<?php 
class Logo {

    public function showLogo() {
        $dirname = "assets/images/";
        $images = glob($dirname."*");   
        foreach($images as $image) {
            echo '<a href="index.php"><img class="menu-logo-img" src="'.$image.'" /><a/>';
        }
    }

    public function changeLogo() {
        $file = $_FILES['file'];

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png', 'gif');

        if(in_array($fileActualExt, $allowed)) {
            if($fileError === 0) {
                if($fileSize < 10000000) {
                    $images = glob("../assets/images/*");
                    foreach($images as $image){
                        @unlink($image);
                    }
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = '../assets/images/'.$fileNameNew;  
                    move_uploaded_file($fileTmpName, $fileDestination);
                    echo "<p>Gratulację zmieniłeś swoje logo.</p>";
                }
                else {
                    echo "<p class='red'>Plik jest zbyt duży.</p>";
                }
            }
            else {
                echo "<p class='red'>Błąd dodawania zdjęcia.</p>";
            }
        }
        else {
            echo "<p class='red'>Nie możesz dodać tego typu zdjęcia.</p>";
        }
    }
}
?>