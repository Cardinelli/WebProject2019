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

    $sql = "CREATE TABLE posts (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        url VARCHAR(5555) NOT NULL,
        name varchar(255) NOT NULL,
        text VARCHAR(1024) NOT NULL
     
)";

    $conn->query($sql);
    echo "Table \"Contacts\" created successfully" . PHP_EOL;

    $sql = "INSERT INTO posts (url, name ,text)
    VALUES ('Test',' Test ' ,'Test2' )";

    $conn->exec($sql);
    echo "Message \"Test\" was registered " . PHP_EOL;

} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
