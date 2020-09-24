<?php
session_start();
ini_set('display_errors', '1');

require_once('../model/Connect.php');
$db = connect();

if(isset($_POST['submitForm'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    if ($username != "" && $password != "") {
        try {
            $query = "select * from `users` where `username`=:username and `password`=:password";
            $stmt = $db->prepare($query);
            $stmt->bindParam('username', $username, PDO::PARAM_STR);
            $stmt->bindValue('password', $password, PDO::PARAM_STR);
            $stmt->execute();
            $count = $stmt->rowCount();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($count == 1 && !empty($row)) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['firstname'] = $row['firstname'];
                echo 'connected';

            } else {
                echo "Invalid username and password!";
            }
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    } else {
        echo "Both fields are required!";
    }
}
