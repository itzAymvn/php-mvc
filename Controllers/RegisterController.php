<?php
session_start();
require_once('../Models/Users.php');
$Users = new Users();
if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['passwordc']) && !empty($_POST['username'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordc = $_POST['passwordc'];
    $username = $_POST['username'];
    if ($password == $passwordc) {
        $User = $Users->register($email, $username, $password);
        if ($User) {
            header('Location: ../login?register=success');
        } else {
            header('Location: ../register?error=already_registered');
        }
    } else {
        header('Location: ../register?error=passwords_not_match');
    }
} else {
    header('Location: ../register?error=empty_fields');
}
