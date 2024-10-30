<?php
class UserModel {
    public function getAllUsers() {
        return [
            ["name" => "Alice", "email" => "alice@example.com"],
            ["name" => "Bob", "email" => "bob@example.com"],
            ["name" => "Charlie", "email" => "charlie@example.com"]
        ];
    }
}
?>
