<?php
require_once ('../controller/PostController.php');

echo (new PostController())->createPost();
header('Location: /Projet PHP/Project/index.php');