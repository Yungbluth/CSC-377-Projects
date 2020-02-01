
<?php
// Kevin Sutton
class DatabaseAdaptor {
    private $DB; // The instance variable used in every method
    // Connect to an existing data based named 'imbd_small'
    public function __construct() {
        $dataBase =
        'mysql:dbname=imbd_small;charset=utf8;host=127.0.0.1';
        $user =
        'root';
        $password =
        ''; // Empty string with XAMPP install
        try {
            $this->DB = new PDO ( $dataBase, $user, $password );
            $this->DB->setAttribute ( PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION );
        } catch ( PDOException $e ) {
            echo ('Error establishing Connection');
            exit ();
        }
    }
    public function getAllActors($s){
            $stmt =$this->DB->prepare("SELECT first_name,last_name FROM actors WHERE first_name LIKE '%". $s . "%' or last_name LIKE '%". $s . "%'");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    public function getAllRoles($s){
            $stmt =$this->DB->prepare("SELECT role FROM roles WHERE role LIKE '%". $s . "%'");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    public function getAllMovies($s){
            $stmt =$this->DB->prepare("SELECT name FROM movies WHERE name LIKE '%" . $s . "%'");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    public function getRoles($first,$last){
            $stmt =$this->DB->prepare("SELECT actors.first_name, actors.last_name, roles.role FROM actors " . "JOIN roles" . " ON actors.id = roles.actor_id " . "WHERE actors.first_name = '" . $first . "' and actors.last_name = '" . $last. "'");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    $theDBA = new DatabaseAdaptor();
    $arr = $theDBA->getRoles ('Kevin', 'Bacon');
    print_r ($arr);
?>
