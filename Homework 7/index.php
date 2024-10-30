<?php
require_once 'controllers/UserController.php';

$userController = new UserController();

$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($requestMethod === 'GET' && strpos($requestUri, 'action=json') == true) {
    $userController->getUsersJson();
} else {
    $userController->showUsersPage();
}
?>
