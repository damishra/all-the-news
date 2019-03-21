<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="./assets/styles/bulma.css">
    <script defer src="./assets/scripts/all.js"></script>
</head>
<body>
<?php
require 'classes/DB.class.php';
try {
    $db = new DB();
    $db->fetchArticles();
} catch (Exception $e) {
    die ('???');
}
?>
</body>
</html>

