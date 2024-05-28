<?php
namespace otazkyodpovede;
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/classes/ConfigQnA.php');

use PDO;
use PDOException;
use Exception;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

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
                $_SESSION['is_admin'] = $user['admin'] == 1;
                header("Location: ../domov.php");
                exit();
            } else {
                throw new Exception("Invalid email or password.");
            }
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    public function getAllUsers() {
        try {
            $sql = "SELECT zakaznik_id, meno, priezvisko, email, admin FROM zakaznik";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    public function deleteUser($userId) {
        try {
            $sql = "DELETE FROM zakaznik WHERE zakaznik_id = :user_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user_id', $userId);
            $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    public function toggleAdminLevel($userId) {
        try {
            $sql = "UPDATE zakaznik SET admin = CASE WHEN admin = 1 THEN 0 ELSE 1 END WHERE zakaznik_id = :user_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user_id', $userId);
            $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }
}