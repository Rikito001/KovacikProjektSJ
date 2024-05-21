<?php
namespace otazkyodpovede;

define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/classes/ConfigQnA.php');
use PDO;
use PDOException;
class QnA{
    private $conn;
    public function __construct() {
        $this->connect();
    }
    private function connect() {
        $config = DATABASE;

        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        );
        try {
            $this->conn = new PDO('mysql:host=' . $config['HOST'] . ';dbname=' .
                $config['DBNAME'] . ';port=' . $config['PORT'], $config['USER_NAME'],
                $config['PASSWORD'], $options);
        } catch (PDOException $e) {
            die("Chyba pripojenia: " . $e->getMessage());
        }
    }

    public function insertQnA(){
        try {
            // Načítanie JSON súboru
            $data = json_decode(file_get_contents(__ROOT__.'/data/data.json'), true);
            $otazky = $data["otazky"];
            $odpovede = $data["odpovede"];
    
            // Vloženie otázok a odpovedí v rámci transakcie
            $this->conn->beginTransaction();
    
            $sqlCheck = "SELECT COUNT(*) FROM qna WHERE otazka = :otazka";
            $statementCheck = $this->conn->prepare($sqlCheck);
    
            $sqlInsert = "INSERT INTO qna (otazka, odpoved) VALUES (:otazka, :odpoved)";
            $statementInsert = $this->conn->prepare($sqlInsert);
    
            for ($i = 0; $i < count($otazky); $i++) {
                // Existuje už otázka?
                $statementCheck->bindParam(':otazka', $otazky[$i]);
                $statementCheck->execute();
                $count = $statementCheck->fetchColumn();
    
                if ($count == 0) { // Ak otazka neexistuje, tak ju vlož
                    $statementInsert->bindParam(':otazka', $otazky[$i]);
                    $statementInsert->bindParam(':odpoved', $odpovede[$i]);
                    $statementInsert->execute();
                }
            }
            $this->conn->commit();
        } catch (PDOException $e) {
            // Zobrazenie chybového hlásenia
            echo "Chyba pri vkladaní dát do databázy: " . $e->getMessage();
            $this->conn->rollback(); // Vrátenie späť zmien v prípade chyby
        }
    }

    public function getQnAFromDB(){
        try{
            $sql = "SELECT * FROM qna";
            $statement = $this -> conn ->prepare($sql);
            $statement->execute();
            $qna = $statement->fetchAll();
            return $qna;
        }

        catch (PDOException $e){
            echo "Chyba pri načítaní" . $e->getMessage();
        }
        
    }

    public function displayQnA() {
        try {
            $qna = $this->getQnAFromDB();

            if ($qna) {
                echo '<section class="container">';
                foreach($qna as $row){
                    echo '<div class="vec">
                    <div class="otazka">'.$row['otazka'].'</div>
                    <div class="odpoved">'.$row['odpoved'].'</div>
                    </div>';
                }
                echo '</section>';
            } 
            else {
                echo 'Nenašli sa otázky a odpovede.';
            }
        } catch (PDOException $e) {
            echo "Chyba pri ukladaní :". $e->getMessage();
        }
    }

}