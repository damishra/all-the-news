<?php
 require '/var/www/html/vendor/autoload.php';

 class MongoDB {

    /**
     * $db     Stores the database connection
     * $coll   Stores the collection
     * $doc    Stores the document retrieved
     * $res    Stores the array fetched from the collection
     */
    private $conn, $coll, $doc, $res;

    /**
     * @author Dishant Mishra
     * @version 0.1.0
     * 
     * Constructor to connect to the database.
     * Also turns error reporting off for security.
     */
    public function __construct() {
        error_reporting(0);
        try {
            $this->conn = new MongoDB\Client();
        } catch (Exception $e) {
            die ("Error in MongoDB constructor...");
        }
    }

    public function fetchArticles() {
        try {
            $this->coll = $this->conn->selectCollection('newsdata','articles');

        } catch (Exception $e) {
            die ("Error in fetchArticles()...");
        }
    }

    public function searchArticles() {
        try {

        } catch (Exception $e) {

        }
    }

    public function selectArticle() {
        try {

        } catch (Exception $e) {

        }
    }

    public function fetchComments() {
        try {
            $this->coll = $this->conn->selecyCollection('newsdata','comments');
        } catch (Exception $e) {
            die ("Error in fetchComments()...");
        }
    }

    public function fetchImage() {
        try {
            $this->coll = $this->conn->selectCollection('newsdata','articles');
        } catch (Exception $e) {
            die ("Error in fetchImages()...");
        }
    }

    public function storeComment() {
        try {

        } catch (Exception $e) {

        }
    }

    /**
     * @author Dishant Mishra
     * @version 0.1.0
     * 
     * Static function to convert BSON strins to PHP arrays.
     */
    public static function toArray($bson) {
        return json_decode(MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($bson)));
    }

 }


