<?php
/**
 * Created by PhpStorm.
 * User: Dishant Mishra
 * Date: 3/24/2019
 * Time: 10:23 PM
 */

require_once "../../classes/DB.class.php";

$db = new DB();
$db->storeComment($_POST['name'], $_POST['comment'], $_POST['id']);
header('Location: ../../content.php?id='.$_POST['id']);