<?php 
class Portfolio {

    public function addPortfolio() {
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
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = '../assets/portfolio/'.$fileNameNew;  
                    move_uploaded_file($fileTmpName, $fileDestination);
                    echo "<p>Gratulację dodałeś nowe zdjęcie do portfolio</p>";
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

    public function showAllPortfolio() {
        $dir = 'assets/portfolio';
        $imagesExtensions = array('jpg', 'jpeg', 'gif', 'png');
        $files = scandir($dir);
        foreach($files AS $file) {
            $fileinfo = pathinfo($file);
            if(is_file($dir.'/'.$file) AND in_array($fileinfo['extension'], $imagesExtensions)) {
                echo '<a href="'.$dir.'/'.$file.'"><img class="portfolio-img" src="'.$dir.'/'.$file.'" /></a>';
            }
        }
    }

    public function showAllEditPortfolio() {
        $dir = '../assets/portfolio';
        $imagesExtensions = array('jpg', 'jpeg', 'gif', 'png');
        $files = scandir($dir);
        foreach($files AS $file) {
            $fileinfo = pathinfo($file);
            if(is_file($dir.'/'.$file) AND in_array($fileinfo['extension'], $imagesExtensions)) {
                echo '
                <div class="box">
                    <div class="box-content article-form">
                        <img class="portfolio-img" src="'.$dir.'/'.$file.'" />
                    </div>
                    <form class="portfolio-form" action="deleteportfolio.php" method="post">
                        <input type="hidden" name="portfolio" value="'.$dir.'/'.$file.'">
                        <input class="article-input-delete" type="submit" value="Usuń">
                    </form>
                </div>
                ';
            }
        }
    }
}
?>