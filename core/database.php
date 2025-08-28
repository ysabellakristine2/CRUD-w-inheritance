<?php

// database class is the superclass
class Database {
    protected PDO $pdo; // private and protected are different; protected can be used by any subclasses, private cannot be used by subclasses
    
    // I just reused my previous dbConfig.php from past activities and put it in a constructor
    public function __construct() {
        $host = "localhost";
        $dbname = "student_db";
        $user = "root";
        $password = "";
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try { 

    $this->pdo = new PDO("mysql:host=$host", $user, $password, $options); // Connect to the server, not the database yet
    $this->pdo->exec("SET time_zone = '+08:00';");                                               // Sets timezone for database

    $this->pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbname`");   // Create the database if it doesn't exist
    $this->pdo->exec("USE `$dbname`");                             // Select the database
    
    // this is my (not) patented self-initializing database, all I need to do is make sure that schema.sql has the words CREATE TABLE IF NOT EXISTS, used it since 2024
    if (file_exists(__DIR__ . '/schema.sql')) {
        $schema = file_get_contents(__DIR__ . '/schema.sql');  // Reads content of the schema.sql file
        $this->pdo->exec($schema);                      // Executes SQL statements to create tables
        $dbCreation_Message = "This works.<br>";                     // Prints statement once completed
    } else {
        $dbCreation_Message = "Schema file not found.<br>";
    }

    } catch (PDOException $e) {
        $dbconnection_Message = "Data insertion failed: " . $e->getMessage();          // Error handling
        }
    }

    //Sir, I can't believe that this is an easieer way to do CRUD, not me crying in the past
    // Methods for CRUD
    public function create(string $table, array $data): bool {
        // creates columns by taking the keys (implode) from data; implode is a PHP function that takes an array and gathers all keys into one string and your chosen separator
        $columns = implode(", ", array_keys($data));
        
        // then creates placeholders for safety reasons
        $placeholders = implode(", ", array_map(fn($key) => ":$key", array_keys($data)));
        
        // prepares SQL queries ahead of time then executes it
        $stmt = $this->pdo->prepare("INSERT INTO $table ($columns) VALUES ($placeholders)");
        return $stmt->execute($data);
    }

    // Method to fetch all data
    public function read(string $table, string $condition = "1"): array {
        $stmt = $this->pdo->query("SELECT * FROM $table WHERE $condition");
        return $stmt->fetchAll();
    }

    // Method to update existing data
    public function update(string $table, array $data, string $condition): bool {
        // using implode is doing wonders for my mental health, that's for sure
        $set = implode(", ", array_map(fn($key) => "$key = :$key", array_keys($data)));

        // preparing and executing SQL queries
        $stmt = $this->pdo->prepare("UPDATE $table SET $set WHERE $condition");
        return $stmt->execute($data);
    }

    // Delete method, 'nuff said
    public function delete(string $table, string $condition): bool {
        $stmt = $this->pdo->prepare("DELETE FROM $table WHERE $condition");
        return $stmt->execute();
    }
}
?>