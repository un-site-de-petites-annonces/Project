<?php
require_once (__DIR__ . '/../controller/UserController.php');

echo (new UserController())->sign();