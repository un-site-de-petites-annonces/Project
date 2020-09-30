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

public function newPost() {
            $req = $this->db->prepare("INSERT INTO posts(title, content, price, author) VALUES(?, ?, ?, ?)");
            $req->execute(array($title, $content, $price, $author));
            return 'Annonce créée !';
}

public function newPostImage() {
    $target_dir = "SRC/IMG/";
    $target_file = $target_dir . basename($_FILES['imagePath']['name']);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if($imageFileType == "jpg" OR $imageFileType == "png" OR $imageFileType == "jpeg"
    OR $imageFileType == "gif" ){
        if ($_FILES["imagePath"]["size"] <= 4000000){
            move_uploaded_file($_FILES['imagePath']['tmp_name'], $target_file);
        }
        else{
            echo 'Fichier trop volumineux, 4Mo maximum';
        }
    }
    else{
        echo 'Extension d\'image incompatible, veuillez charger une image .jpg, .png, .jpeg, .gif';
    }
    return $target_file;
}

public function updatePost() {
    // Editer une annonce
}

public function deletePost() {
    // Supprimer une annonce
}

}