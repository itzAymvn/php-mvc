<?php
session_start();
require_once('../Models/Users.php');
$Users = new Users();
if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $User = $Users->login($email, $password);
    if ($User) {
        $_SESSION['user'] = $User;
        header('Location: ../');
    } else {
        header('Location: ../login?error=not_registered');
    }
} else {
    header('Location: ../login?error=empty_fields');
}
