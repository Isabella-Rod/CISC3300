<?php

namespace app\controllers;
use app\models\Post;

class PostController {
    
    public function create($title, $content) {
        $errors = Post::validate($title, $content);
        if (!empty($errors)) {
            return ['errors' => $errors];
        }

        try {
            $pdo = new PDO('mysql:host=localhost;dbname=your_database_name', 'username', 'password');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("INSERT INTO posts (title, content) VALUES (:title, :content)");
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->execute();

            return ['success' => true];
        } catch (PDOException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function getPosts($search = null) {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=your_database_name', 'username', 'password');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if ($search) {
                $stmt = $pdo->prepare("SELECT * FROM posts WHERE title LIKE :search");
                $searchParam = "%" . $search . "%";
                $stmt->bindParam(':search', $searchParam);
            } else {
                $stmt = $pdo->prepare("SELECT * FROM posts");
            }

            $stmt->execute();
            $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $posts;
        } catch (PDOException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function update($id, $title, $content) {
        $errors = Post::validate($title, $content);
        if (!empty($errors)) {
            return ['errors' => $errors];
        }

        try {
            $pdo = new PDO('mysql:host=localhost;dbname=your_database_name', 'username', 'password');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("UPDATE posts SET title = :title, content = :content WHERE id = :id");
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return ['success' => true];
        } catch (PDOException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function delete($id) {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=your_database_name', 'username', 'password');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("DELETE FROM posts WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return ['success' => true];
        } catch (PDOException $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
?>
