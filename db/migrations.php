<?php


$config = require_once __DIR__ . '/../config.php';

$servername = $config['host'];
$username = $config['username'];
$password = $config['password'];
$database = $config['database'];

$conn = new PDO("mysql:host=$servername", $username, $password);

try {
    $sql = "CREATE DATABASE $database";
    $conn->exec($sql);
    echo "Database created successfully" . PHP_EOL;
    $conn->query("use $database");

    $sql = "CREATE TABLE users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        role INT(6) NOT NULL,
        password VARCHAR(255) NOT NULL,
        reg_date TIMESTAMP  
)";

    $conn->query($sql);
    echo "Table \"users\" created successfully" . PHP_EOL;

    $sql = "INSERT INTO users (username, email, role, password, reg_date)
    VALUES ('Admin', 'admin@example.com', '1','" . password_hash('admin', PASSWORD_BCRYPT) ."', " . time() .")";

    $conn->exec($sql);
    echo "User \"admin\" was registered " . PHP_EOL;

} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}