<?php
session_start();

class PagesController
{

    public function index()
    {
        // check if the user is logged in
        if (isset($_SESSION['user'])) {
            require_once('./views/Home.php');
        } else {
            require_once('./views/Home.php');
        }
    }

    public function login()
    {
        // check if the user is already logged in
        if (isset($_SESSION['user'])) {
            // redirect to home
            header('Location: ./');
        } else {
            // show the login page
            require_once('./views/Login.php');
        }
        // check if the user is trying to login

    }

    public function register()
    {
        // check if the user is already logged in
        if (isset($_SESSION['user'])) {
            // redirect to home
            header('Location: ./');
        } else {
            // show the register page
            require_once('./views/Register.php');
        }
    }

    public function profile()
    {
        // check if the user is logged in
        if (isset($_SESSION['user'])) {
            // show the profile page
            require_once('./views/Profile.php');
        } else {
            // redirect to login
            header('Location: ./login');
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: ./');
    }
}
