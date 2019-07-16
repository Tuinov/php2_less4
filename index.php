<?php
define('DB_DRIVER', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'geekbrains');
define('DB_USER', 'root');
define('DB_PASS', '');

class Show {

    public static $id = 0;

    function start($tt) {
// $dbh = new PDO('mysql:host=localhost;port=3307;dbname=geekbrains', 'root', '');
        try {
            $connect_str = DB_DRIVER . ':host=' . DB_HOST . ';port=3307;dbname=' . DB_NAME;
            $db = new PDO($connect_str, DB_USER, DB_PASS);
            $result = $db->query("SELECT * FROM geekbrains.goods where id > {$tt} limit 3");

            while($row = $result->fetch()){
                echo $row['name'] . '<img src="09.jpg" alt="">';
            }

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

        self::$id += 3;
    }
}

(new Show)->start(0);
var_dump((new Show)::$id);

if($_GET['quan']) {
    $tt = (new Show)::$id;
    (new Show)->start($tt);
}

?>

<a href="?quan=<?=(new Show)::$id?>">добавить</a>
