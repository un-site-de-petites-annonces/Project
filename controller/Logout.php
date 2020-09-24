<?php

session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);

echo 'vous avez été déconecter';
header('Refresh: 2; URL = LoginController.php');

