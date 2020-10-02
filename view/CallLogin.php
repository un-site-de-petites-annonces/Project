<?php
require_once (__DIR__ . '/../controller/UserController.php');

echo (new UserController())->login();
header( "refresh:1;url=../index.php" );
