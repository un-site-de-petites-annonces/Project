<?php

class LoginController {

session_start();
ini_set('display_errors', '1');

require_once('../model/Mysql.php');


if(isset($_POST['submitForm'])) {
$username = $_POST['username'];
$password = md5($_POST['password']);
$db = new Mysql();
$db = $db->login($username,$password);
return $db;
}

}
