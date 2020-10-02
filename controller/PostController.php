<?php
require(__DIR__ . '/../model/Post.php');
ini_set('display_errors', '1');

class PostController {

    public function showPosts() {

        $post = new Post();
        $posts = $post->getPosts();
        return $posts;
    }
    
    public function showPost() {
        $post = new Post();
        $showPost = $post->getPost($_GET['id']);
        return $showPost;
    }

    public function createPost() {
        if(isset($_POST['submitPost'])) {

            $dossier = '../SRC/IMG';
            $fichier = basename($_FILES['image']['name']);
            if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier))
            {
                 echo 'Upload effectué avec succès !';

            $title  = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['content']);
            $priceString = htmlspecialchars($_POST['price']);
            $priceInt = (int)$priceString;
            $author = htmlspecialchars($_SESSION['username']);
            if(!empty($_POST['title']) AND !empty($_POST['content']) AND !empty($_POST['price'])) {

                    $post = new Post();
                        $post->newPost($title, $content, $priceString, $author, $fichier);
                        echo "Votre annonce a bien été créée !";

            } else echo "Tous les champs doivent être complétés !";
        }  
    }


}
}