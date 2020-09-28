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
        
    }
}