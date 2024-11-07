=<?php
class Post {
    private $id;
    private $title;
    private $content;

    public function __construct($title, $content) {
        $this->title = $title;
        $this->content = $content;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    public static function validate($title, $content) {
        $errors = [];
        if (empty($title) || strlen($title) < 3) {
            $errors['title'] = "Title must be at least 3 characters.";
        }
        if (empty($content) || strlen($content) < 5) {
            $errors['content'] = "Content must be at least 5 characters.";
        }
        return $errors;
    }
}
?>
