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

    $sql = "CREATE TABLE contact (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(255) NOT NULL,
        lastname VARCHAR(255) NOT NULL,
        email INT(6) NOT NULL,
        message VARCHAR(255) NOT NULL,
        send_date TIMESTAMP  
)";

    $conn->query($sql);
    echo "Table \"Contacts\" created successfully" . PHP_EOL;

    $sql = "INSERT INTO contact (firstname, lastname, email, message, send_date)
    VALUES ('Test', 'Test2', 'Test@example.com','message', " . time() .")";

    $conn->exec($sql);
    echo "Message \"Test\" was registered " . PHP_EOL;

} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}