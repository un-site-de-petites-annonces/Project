<?php
require_once ('../controller/PostController.php');


    if (isset($_GET['action'])) {
        $action = $_REQUEST['action'];
        switch($action) { 
            case 'showPost': 
                echo (new PostController())->showPost();
                require('show_post.php');
            break;
        }
    }