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

    public function createPost() {
        if(isset($_POST['sin'])) {

            $title  = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['content']);
            $priceString = htmlspecialchars($_POST['price']);
            $priceInt = (int)$priceString;
            $author = htmlspecialchars($_SESSION['username']);
            if(!empty($_POST['title']) AND !empty($_POST['content'])AND !empty($_POST['price'])) {

                    $post = new Post();
                        $post->newPost($title, $content, $priceInt, $author);
                        echo "Votre annonce a bien été créée !";

            } else echo "Tous les champs doivent être complétés !";
        }  
    }
}