<?php session_name('atn'); session_start(); ?>

<!doctype html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>All The News</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/styles/bulma.css">
    <link href="https://fonts.googleapis.com/css?family=Libre+Barcode+128+Text" rel="stylesheet">
    <script defer src="assets/scripts/all.js"></script>
</head>
<body class="container">
    <br>
    <div class="columns">
        <aside class="column is-one-fifth">
            <div>
                <a class="navbar-content" href="https://dishantmishra.me/all-the-news" style="font-family: 'Libre Barcode 128 Text', 'Helvetica Neue', Helvetica, Arial, serif;">
                    <h1 class="subtitle is-1">All The News!</h1>
                </a>
                <br>
                <form method="post" action="">
                    <div class="field">
                        <label class="label">SEARCH</label>
                        <div class="control">
                            <p class="control has-icons-left has-icons-right">
                                <input class="input is-small is" type="text" placeholder="Search Titles" name="term">
                                <span class="icon is-small is-left">
                                  <i class="fas fa-search"></i>
                                </span>
                            </p>
                            <div style="min-height: 10px"></div>
                            <p>
                                <input class="is-hidden" name="type" value="title">
                                <input type="submit" class="button is-small is-dark" value="search">
                            </p>
                        </div>
                    </div>
                </form>
                <br>
                <form method="post" action="">
                    <div class="field">
                        <div class="control">
                            <p class="control has-icons-left has-icons-right">
                                <input class="input is-small is" type="text" placeholder="Search Content" name="term">
                                <span class="icon is-small is-left">
                                  <i class="fas fa-search"></i>
                                </span>
                            </p>
                            <div style="min-height: 10px"></div>
                            <p>
                                <input class="is-hidden" name="type" value="content">
                                <input type="submit" class="button is-small is-dark" value="search">
                            </p>
                        </div>
                    </div>
                </form>
                <br>
                <form method="post" action="">
                    <div class="field">
                        <div class="control">
                            <p class="control has-icons-left has-icons-right">
                                <input class="input is-small is" type="text" placeholder="Search Authors" name="term">
                                <span class="icon is-small is-left">
                                  <i class="fas fa-search"></i>
                                </span>
                            </p>
                            <div style="min-height: 10px"></div>
                            <p>
                                <input class="is-hidden" name="type" value="author">
                                <input type="submit" class="button is-small is-dark" value="search">
                            </p>
                        </div>
                    </div>
                </form>
                <br>
                <form method="post" action="">
                    <div class="field">
                        <div class="control">
                            <p class="control has-icons-left has-icons-right">
                                <input class="input is-small is" type="text" placeholder="Search Publication" name="term">
                                <span class="icon is-small is-left">
                                  <i class="fas fa-search"></i>
                                </span>
                            </p>
                            <div style="min-height: 10px"></div>
                            <p>
                                <input class="is-hidden" name="type" value="publication">
                                <input type="submit" class="button is-small is-dark" value="search">
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </aside>
        <div class="allowScroll column is-four-fifths">
            <?php
                require 'classes/DB.class.php';
                try {
                    $db = new DB();
                    $db->searchArticles($_POST['term'], $_POST['type']);
                } catch (Exception $e) {
                    die ('???');
                }
            ?>
        </div>
    </div>
</body>
</html>