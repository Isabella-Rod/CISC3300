<?php

require_once __DIR__ . '/../models/UserModel.php';

class UserController {
    public function showUsersPage() {
        include __DIR__ . '/../views/users.html';
    }

    public function getUsersJson() {
        $userModel = new UserModel();
        header('Content-Type: application/json');
        echo json_encode($userModel->getAllUsers());
    }
}
?>
