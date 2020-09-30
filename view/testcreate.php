<?php
require_once (__DIR__ . '/../controller/PostController.php');

echo (new PostController())->createPost();