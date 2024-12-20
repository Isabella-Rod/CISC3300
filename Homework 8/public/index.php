
<?php

require "/Users/isabellarodrigues/Documents/College/2024-2025/Fall 2024/Web & Programming/CISC3300/Homework/Homework 8/homework-8-main/app/models/User.php";
require "/Users/isabellarodrigues/Documents/College/2024-2025/Fall 2024/Web & Programming/CISC3300/Homework/Homework 8/homework-8-main/app/controllers/UserController.php";

use app\controllers\UserController;

//get URI without query string
$url = strtok($_SERVER["REQUEST_URI"], '?');

//split url into array
$uriArray = explode("/", $url);

if ($uriArray[1] === 'api' && $uriArray[2] === 'users' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $userController = new UserController();
    $userController->getUsers();
}

if ($uriArray[1] === 'users' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    require './views/users.html';
}

if ($uriArray[1] === 'api' && $uriArray[2] === 'users' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $userController = new UserController();
    $userController->saveUser();
}

if ($uriArray[1] === 'add-users' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    require './views/add-users.html';
}
