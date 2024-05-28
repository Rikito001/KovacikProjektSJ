<?php
namespace otazkyodpovede;

define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/classes/ConfigQnA.php');
use PDO;
use PDOException;

class UserRegistration {
    private $conn;

    public function __construct() {
        $this->connectDatabase();
    }

    private function connectDatabase() {
        try {
            $config = DATABASE;

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ];

            $this->conn = new PDO(
                'mysql:host=' . $config['HOST'] . ';dbname=' . $config['DBNAME'] . ';port=' . $config['PORT'], 
                $config['USER_NAME'], 
                $config['PASSWORD'], 
                $options
            );
        } catch (PDOException $e) {
            echo "Database connection failed: " . $e->getMessage();
            exit();
        }
    }

    public function registerUser($name, $surname, $email, $password) {
        try {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO zakaznik (meno, priezvisko, email, heslo) VALUES (:name, :surname, :email, :password)";
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':surname', $surname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashed_password);

            echo $password;
            echo $hashed_password;

            $stmt->execute();

            header("Location: ../success.php");
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            exit();
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $registration = new UserRegistration();
    $registration->registerUser($name, $surname, $email, $password);
} else {
    echo "No POST request received.";
}
?>
