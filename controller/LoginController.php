<?php
require_once('../model/Mysql.php');
session_start();
ini_set('display_errors', '1');

class LoginController
{


    /**
     * @return string
     */
    public function login(){

        if(isset($_POST['submitForm'])) {
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $db = new Mysql();
            $db = $db->login($username,$password);
            return $db;
        }
    }


}
