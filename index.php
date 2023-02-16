<?php

$base_url = "http://localhost/apps/php-mvc/";

// Get the current URL
$current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// Remove the base URL from the current URL to get the route
$route = substr($current_url, strlen($base_url));

// Remove query strings from the route
$route = explode("?", $route)[0];

// Remove trailing slashes from the route
$route = rtrim($route, "/");

// Add a leading slash to the route
$route = "/" . $route;

// Load the controller
require_once "controllers/PagesController.php";

switch ($route) {
    case "/":
        $PagesController = new PagesController();
        $PagesController->index();
        break;
    case "/login":
        $PagesController = new PagesController();
        $PagesController->login();
        break;
    case "/register":
        $PagesController = new PagesController();
        $PagesController->register();
        break;
    case "/logout":
        $PagesController = new PagesController();
        $PagesController->logout();
        break;
    case "/profile":
        $PagesController = new PagesController();
        $PagesController->profile();
        break;
    default:
        echo "404";
        break;
}
