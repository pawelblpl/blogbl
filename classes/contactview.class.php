<?php 
class contactView extends Contact {

    public function showContact() {
        $stmt = $this->getContact();
        while($row = $stmt->fetch()) {
            echo ''.$row['contact'].'';
        }
    }
}
?>