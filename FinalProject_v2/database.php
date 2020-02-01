<?php
class database {
    private $DB;
    public function __construct() {
        $dataBase = 'mysql:dbname=movieslist;charset=utf8;host=127.0.0.1';
        $user = 'root';
        $password = '';
        try {
            $this->DB = new PDO ( $dataBase, $user, $password );
            $this->DB->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        } catch ( PDOException $e ) {
            echo ('Error establishing Connection');
            exit();
        }
    }
    public function registerCheck($user) {
        $stmt = $this->DB->prepare("SELECT * FROM accounts WHERE accounts.username='" . $user . "';");
        $stmt->execute();
        return $stmt->fetchAll (PDO::FETCH_ASSOC);
    }
    public function getName($name) {
        $stmt = $this->DB->prepare("Select movies.movie_name from movies " .
            "WHERE movies.movie_name LIKE '%" . $name . "%';");
        $stmt->execute();
        return $stmt->fetchAll (PDO::FETCH_ASSOC);
    }
    public function getGenre($name) {
        $stmt = $this->DB->prepare("Select movies.genre from movies " .
            "WHERE movies.genre LIKE '%" . $name . "%';");
        $stmt->execute();
        return $stmt->fetchAll (PDO::FETCH_ASSOC);
    }
    public function getDirector($name) {
        $stmt = $this->DB->prepare("Select movies.director from movies " .
            "WHERE movies.director LIKE '%" . $name . "%';");
        $stmt->execute();
        return $stmt->fetchAll (PDO::FETCH_ASSOC);
    }
    public function getAll() {
        $stmt = $this->DB->prepare("Select * FROM movies;");
        $stmt->execute();
        return $stmt->fetchAll (PDO::FETCH_ASSOC);
    }
    public function register($username, $password) {
        $stmt = $this->DB->prepare("INSERT INTO accounts (username, password) " . 
            "VALUES ('" . $username . "', '" . $password . "');");
        $stmt->execute();
        return $stmt->fetchAll (PDO::FETCH_ASSOC);
    }
    public function logIn($user, $pass) {
        $stmt = $this->DB->prepare("SELECT * FROM accounts WHERE accounts.username='" . $user . "' AND accounts.password='" . $pass . "';");
        $stmt->execute();
        return $stmt->fetchAll (PDO::FETCH_ASSOC);
    }
}
?>