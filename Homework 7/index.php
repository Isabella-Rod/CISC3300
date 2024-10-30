<?php
require_once 'controllers/UserController.php';
require_once 'models/UserModel.php';

$userController = new UserController();

$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($requestUri === '/users' && $requestMethod === 'GET') {
    $userController->getUsersJson();
} else {
    $userController->showUsersPage();
}
?>
