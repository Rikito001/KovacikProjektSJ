<?php
namespace otazkyodpovede;

define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/classes/ConfigQnA.php');
use PDO;
use PDOException;
use Exception;

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $config = DATABASE;

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        $conn = new PDO(
            'mysql:host=' . $config['HOST'] . ';dbname=' . $config['DBNAME'] . ';port=' . $config['PORT'], 
            $config['USER_NAME'], 
            $config['PASSWORD'], 
            $options
        );

        // Retrieve form data
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Prepare and execute SQL statement to fetch the user data
        $sql = "SELECT zakaznik_id, meno, priezvisko, heslo FROM zakaznik WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Fetch the user data
        $user = $stmt->fetch();

        print_r($user);

        if (password_verify($password, $user['heslo'])) {
            // Password is correct, start the session
            $_SESSION['user_id'] = $user['zakaznik_id'];
            $_SESSION['user_name'] = $user['meno'];
            $_SESSION['user_surname'] = $user['priezvisko'];
            $_SESSION['logged_in'] = true;

            // Redirect to the user dashboard or another protected page
            header("Location: ../domov.php");
            exit();
        } else {
            // Invalid email or password
            throw new Exception("Invalid email or password.");
        }
    } catch (PDOException $e) {
        // Database connection or query error
        echo "Database error: " . $e->getMessage();
        exit();
    } catch (Exception $e) {
        // General error
        echo "Error: " . $e->getMessage();
        exit();
    }
} else {
    // Debugging: output if request method is not POST
    echo "No POST request received.";
}
