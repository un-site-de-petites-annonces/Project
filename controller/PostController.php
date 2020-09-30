<?php
require_once(__DIR__ . '/../model/Post.php');
session_start();
ini_set('display_errors', '1');

class PostController {

    public function showPosts() {

        $post = new Post();
        $posts = $post->getPosts();
        return $posts;
    }

    public function newPostImage() {
   
    }

    public function createPost() {
        if(isset($_POST['submitPost'])) {

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

            $title  = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['content']);
            $priceString = htmlspecialchars($_POST['price']);
            $priceInt = (int)$priceString;
            $author = htmlspecialchars($_SESSION['username']);
            if(!empty($_POST['title']) AND !empty($_POST['content']) AND !empty($_POST['price'])) {

                    $post = new Post();
                        $imgUrl = $target_file;
                        $post->newPost($title, $content, $priceString, $author, $imgUrl);
                        echo "Votre annonce a bien été créée !";

            } else echo "Tous les champs doivent être complétés !";
        }  
    }


}