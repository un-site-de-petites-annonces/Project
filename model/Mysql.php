<?php
ini_set('display_errors', '1');

class Mysql
{
    private $db;


    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=phproject','ouss', 'root');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            return "Erreur !: " . $e->getMessage() . "<br/>";
        }
    }

    public function login($username,$password){
        try {
            $query = "select * from `users` where `username`=:username and `password`=:password";
            $req = $this->db->prepare($query);
            $req->bindParam('username', $username, PDO::PARAM_STR);
            $req->bindValue('password', $password, PDO::PARAM_STR);
            $req->execute();
            $count = $req->rowCount();
            $row = $req->fetch(PDO::FETCH_ASSOC);
            if ($count == 1 && !empty($row)) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['firstname'] = $row['firstname'];
                return 'connected';

            } else {
                return "Invalid username and password!";
            }
        } catch (PDOException $e) {
            return "Error : " . $e->getMessage();
        }
    }


}

