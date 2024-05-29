<?php
namespace otazkyodpovede;

define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/classes/ConfigQnA.php');
use PDO;
use PDOException;
use Exception;

session_start();

class UserAuthentication {
    private $conn;

    public function __construct() {
        $this->connectDatabase();
    }

    private function connectDatabase() {
        try {
            $config = DATABASE;

            $this->conn = new PDO(
                'mysql:host=' . $config['HOST'] . ';dbname=' . $config['DBNAME'] . ';port=' . $config['PORT'], 
                $config['USER_NAME'], 
                $config['PASSWORD']
            );
        } catch (PDOException $e) {
            throw new Exception("Database connection failed: " . $e->getMessage());
        }
    }

    public function loginUser($email, $password) {
        try {
            $sql = "SELECT zakaznik_id, meno, priezvisko, heslo, admin FROM zakaznik WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['heslo'])) {
                $_SESSION['user_id'] = $user['zakaznik_id'];
                $_SESSION['user_name'] = $user['meno'];
                $_SESSION['user_surname'] = $user['priezvisko'];
                $_SESSION['logged_in'] = true;


                if ($user['admin'] == 1) {
                    $_SESSION['is_admin'] = true;
                } else {
                    $_SESSION['is_admin'] = false;
                }




                header("Location: ../domov.php");
                exit();
            } else {
                header("Location: ../ErrorLogin.php");
            }
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $auth = new UserAuthentication();
        $auth->loginUser($email, $password);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        exit();
    }
} else {
    echo "No POST request received.";
    exit();
}
?>
