

<?php
    require '../../classes/DB.class.php';
    try {
        $db = new DB();
        $db->searchArticles($_POST['term'], $_POST['type']);
    } catch (Exception $e) {
        die ('???');
    }
?>