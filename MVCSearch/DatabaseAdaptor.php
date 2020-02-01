<?php
class DatabaseAdaptor {
    private $DB;
    public function __construct() {
        $dataBase = 'mysql:dbname=imdb_small;charset=utf8;host=127.0.0.1';
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
public function getActors($name) {
    $stmt = $this->DB->prepare("Select actors.first_name AS first_name, " . 
        "actors.last_name AS last_name from actors " .
        "WHERE actors.first_name LIKE '%" . $name . "%' OR " . 
        "actors.last_name LIKE '%" . $name . "%';");
    $stmt->execute();
    return $stmt->fetchAll (PDO::FETCH_ASSOC);
}
public function getMovies($name) {
    $stmt = $this->DB->prepare("Select movies.name from movies " .
        "WHERE movies.name LIKE '%" . $name . "%';");
    $stmt->execute();
    return $stmt->fetchAll (PDO::FETCH_ASSOC);
}
public function getRoles($name) {
    $stmt = $this->DB->prepare("Select roles.role from roles " .
        "WHERE roles.role LIKE '%" . $name . "%';");
    $stmt->execute();
    return $stmt->fetchAll (PDO::FETCH_ASSOC);
}
} // End class DatabaseAdaptor