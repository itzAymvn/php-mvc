<?php

class Users
{
    private $db;
    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=mvc', 'root', '');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function login($email, $password)
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $query->execute(['email' => $email]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        if ($user) {
            if (password_verify($password, $user->password)) {
                $_SESSION['user'] = $user;
                return $user;
            }
        }
        return false;
    }

    public function register($email, $username, $password)
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $query->execute(['email' => $email]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        if ($user) {
            return false;
        } else {
            $query = $this->db->prepare("INSERT INTO users (email, name, password) VALUES (:email, :name, :password)");
            $query->execute(['email' => $email, 'name' => $username, 'password' => password_hash($password, PASSWORD_DEFAULT)]);
            return true;
        }
    }


    public function getUser($id)
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $query->execute(['id' => $id]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        if ($user) {
            return $user;
        }
        return false;
    }
}
