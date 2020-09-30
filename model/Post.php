<?php

class Post {

private $db;

public function __construct() {

    try {
        $this->db = new PDO('mysql:host=localhost;dbname=phproject','root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (PDOException $e) {
        return "Erreur !: " . $e->getMessage() . "<br/>";
    }
}

public function getPosts() {

            try {
                $query = "SELECT * FROM posts ORDER BY id DESC";
                $req = $this->db->prepare($query);
                $req->execute();
                $count = $req->rowCount();
                $posts = $req->fetchAll(PDO::FETCH_ASSOC);

                return $posts;
            } catch (PDOException $e) {
                return "Error : " . $e->getMessage();
            }
               
}

public function getPost() {
        
}

public function newPost($title, $content, $price, $author, $imagePath) {
            $req = $this->db->prepare("INSERT INTO posts(title, content, price, author, imagePath) VALUES(?, ?, ?, ?, ?)");
            $req->execute(array($title, $content, $price, $author, $imagePath));
            return 'Annonce créée !';
}



public function updatePost() {
    // Editer une annonce
}

public function deletePost() {
    // Supprimer une annonce
}

}