<?php
/** @noinspection ALL */
require '/var/www/html/vendor/autoload.php';

 class DB {

    /**
     * $db     Stores the database connection
     * $coll   Stores the collection
     * $doc    Stores the document retrieved
     * $res    Stores the array fetched from the collection
     */
    private $conn, $db, $coll, $doc, $res;

    /**
     * @author Dishant Mishra
     * @version 0.1.0
     * 
     * Constructor to connect to the database.
     * Also turns error reporting off for security.
     */
    public function __construct() {
        try {
            $this->conn = new MongoDB\Client();
            $this->db = $this->conn->newsdata;
        } catch (Exception $e) {
            die ("Error in MongoDB constructor...");
        }
    }

     /**
      * @author Dishant Mishra
      * @version 0.1.0
      *
      * Fetches the default limited result set from the database.
      * For landing page use only...
      */
    public function fetchArticles() {
        try {
            $this->coll = $this->db->{'articles'};
            $cursor = $this->coll->find([],['limit' => 100, 'projection' => ['_id' => 1, 'title' => 1, 'publication' => 1]]);
            foreach ($cursor as $row) {
                echo "<div class=\"box is-block\">";
                foreach ($row as $key=>$col) {
                    switch ($key) {
                        case "publication":
                            echo "<h6 class='subtitle is-6'>$col</h6>";
                            break;
                        case "title":
                            echo "<h1 class='title is-5'>$col</h1>";
                            break;
                        default:
                            break;
                    }
                }
                echo "</div>";
            }
        } catch (Exception $e) {
            die ("Error in fetchArticles()...");
        }
    }

    public function searchArticles($term, $type) {
        try {
            $this->coll = $this->db->{'articles'};
            $cursor = null;
            switch ($type) {
                case "title":
                    $cursor = $this->coll->find(['title' => new \MongoDB\BSON\Regex('^.*\b'.$term.'\b.*$', 'i')],['limit' => 1000, 'projection' => ['_id' => 0, 'title' => 1, 'publication' => 1]]);
                    break;
                case "content":
                    $cursor = $this->coll->find(['title' => new \MongoDB\BSON\Regex('^.*\b'.$term.'\b.*$', 'i')],['limit' => 1000, 'projection' => ['_id' => 0, 'title' => 1, 'publication' => 1]]);
                    break;
                case "author":
                    $cursor = $this->coll->find(['title' => new \MongoDB\BSON\Regex('^.*\b'.$term.'\b.*$', 'i')],['limit' => 1000, 'projection' => ['_id' => 0, 'title' => 1, 'publication' => 1]]);
                    break;
                case "publisher":
                    $cursor = $this->coll->find(['title' => new \MongoDB\BSON\Regex('^.*\b'.$term.'\b.*$', 'i')],['limit' => 1000, 'projection' => ['_id' => 0, 'title' => 1, 'publication' => 1]]);
                    break;
            }

            foreach ($cursor as $row) {
                echo "<div class=\"box is-block\">";
                foreach ($row as $key=>$col) {
                    switch ($key) {
                        case "publication":
                            echo "<h6 class='subtitle is-6'>$col</h6>";
                            break;
                        case "title":
                            echo "<h1 class='title is-5'>$col</h1>";
                            break;
                        default:
                            break;
                    }
                }
                echo "</div>";
            }
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


