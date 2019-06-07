<?php

class Database
{
    private $servername;
    private $username;
    private $password;
    private $database;

    private $connection;

    public function __construct()
    {
        $config = require __DIR__ . '/../config.php';
        $this->servername = $config['host'];
        $this->username = $config['username'];
        $this->password = $config['password'];
        $this->database = $config['database'];
        $this->connection = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
        // set the PDO error mode to exception
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * @return PDO
     */
    public function getConnection()
    {
        return $this->connection;
    }

    public function UserExist($username)
    {
        $stmt = $this->getConnection()
            ->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetchColumn();
        if ($user) {
            return true;
        }
        else return false;
    }
    public function EmailExist($email)
    {
        $stmt = $this->getConnection()
            ->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetchColumn();
        if ($user) {
            return true;
        }
        else return false;
    }

    public function loginUser($email, $password)
    {
        $stmt = $this->getConnection()
            ->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();
        if (!$user || !password_verify($password, $user['password'])) {
            return false;
        }
        $_SESSION['currentUser'] = $user;
        return true;
    }


    public function registerUser($username, $email, $password)
    {
        $stmt = $this->getConnection()
            ->prepare("INSERT INTO users (username, email, role, password, reg_date)
            VALUES (?,?,?,?,?)");
        if (empty($username) || empty($email) || empty($password)){
            return false;
        }
        else if ($this->UserExist($username) !== false){
            return false;
        }
        else if ($this->EmailExist($email) !== false) {
            return false;
        }
        else if (strlen($username) > 22 || strlen($username) < 3) {
            return false;
        }
        else if (strlen($password) > 25 || strlen($password) < 5) {
            return false;
        }
        else {
            $stmt->execute([$username, $email, '2', password_hash($password, PASSWORD_BCRYPT), time()]);
            return true;
        }
    }

    public function sendMessage($firstname, $lastname, $email, $message)
    {
        $stmt = $this->getConnection()
            ->prepare("INSERT INTO contacts (firstname, lastname, email, message, send_date)
            VALUES (?,?,?,?,?)");

        $stmt->execute([$firstname,$lastname,$email,$message, time()]);
        return true;
    }
    public function writePost($url,$username , $text)
    {
        $stmt = $this->getConnection()
            ->prepare("INSERT INTO posts( url,name , text)
            VALUES (?,?,?)");
        $stmt->execute([$url,$username,$text]);
        return true;
    }

    public function getMessages()
    {
        $stmt = $this->getConnection()
            ->prepare("SELECT * FROM contacts");
        $stmt->execute();
        $contacts [] = $stmt->fetchAll();
        foreach ($contacts as $contact) {
            return $contact;
        }
    }
    public function getPosts()
    {
        $stmt = $this->getConnection()
            ->prepare("SELECT * FROM posts");
        $stmt->execute();
        $posts [] = $stmt->fetchAll();
        foreach ($posts as $post) {
            return $post;
        }
    }

    public function deleteMessage($id)
    {
        $stmt = $this->getConnection()
            ->prepare("DELETE FROM contacts WHERE id = ?");
        $stmt->execute($id);
        return true;
    }

    public function getUsers()
    {
        $stmt = $this->getConnection()
            ->prepare("SELECT * FROM users");
        $stmt->execute();
        $users [] = $stmt->fetchAll();
        foreach ($users as $user) {
            return $user;
        }
    }
    public function changeEmail($email)
    {
        $username = currentUser()['username'];
        $stmt = $this->getConnection()
            ->prepare("UPDATE users SET email = ? WHERE username = ?");
        if (empty($email)) {
            return false;
        }
        else {
            $stmt->execute([$email, $username]);
            return true;
        }
    }
}



