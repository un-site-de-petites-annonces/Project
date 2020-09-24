<?php

class Mysql
{
    private
        $serveur = 'localhost',
        $bdd = 'phproject',
        $user = 'ouss',
        $mdp = 'root',
        $db = '';


    public function __construct($serveur = 'localhost', $bdd = 'phproject', $user = 'ouss', $mdp = 'root')
    {
        $this->serveur = $serveur;
        $this->bdd = $bdd;
        $this->user = $user;
        $this->mdp = $mdp;
        try {
            $this->db = new PDO('mysql:host='.$this->serveur .';dbname='.$this->bdd ."'", $this->user, $this->pwd);
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

