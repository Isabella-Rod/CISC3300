<?php

require_once __DIR__ . '/../models/UserModel.php';

class UserController {
    private $userModel;
    
    public function __construct() {
        $this->userModel = new UserModel();
    }
    
    public function showUsersPage() {
        if (file_exists('views/users.html')) {
            require 'views/users.html';
        }
    }

    public function getUsersJson() {
        header('Content-Type: application/json');
        $data = $this->userModel->getAllUsers();
        echo json_encode($data);
    }
}
?>

