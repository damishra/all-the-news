

<?php
    require '../../classes/DB.class.php';
    try {
        $db = new DB();
        $db->searchArticles($_POST['term']);
    } catch (Exception $e) {
        die ('???');
    }
?>