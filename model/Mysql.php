<?php
ini_set('display_errors', '1');

class Mysql
{
    private $db;


    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=phproject','root', '');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            return "Erreur !: " . $e->getMessage() . "<br/>";
        }
        $tbl_users = "CREATE TABLE IF NOT EXISTS users(
              id INT(11) NOT NULL AUTO_INCREMENT,
			  username VARCHAR(16) NOT NULL,
			  firstname VARCHAR(16) NOT NULL,
			  lastname VARCHAR(16) NOT NULL,
			  email VARCHAR(255) NOT NULL,
			  password VARCHAR(255) NOT NULL,
			  phone VARCHAR(255) NOT NULL,
              PRIMARY KEY (id)
             )";
        $tbl_users = $this->db->prepare($tbl_users);
        $tbl_users->execute();
    }

    public function newUser($username, $firstname, $lastname, $email, $phone, $mdp){

        $req = $this->db->prepare("INSERT INTO users(username,firstname,lastname, email,phone, password) VALUES(?, ?, ?, ?, ?, ?)");
        $req->execute(array($username, $firstname, $lastname, $email, $phone, $mdp));
        return 'Compte Crée';

    }
    public function emailExist($email){
        $query = "select * from `users` where `email`=:email";
        $req = $this->db->prepare($query);
        $req->bindParam('email', $email, PDO::PARAM_STR);
        $req->execute();
        $count = $req->rowCount();
        if($count > 0){
            return true;
        }
        return false;
    }

    public function login($email,$password){
        try {
            $query = "select * from `users` where `email`=:email and `password`=:password";
            $req = $this->db->prepare($query);
            $req->bindParam('email', $email, PDO::PARAM_STR);
            $req->bindValue('password', $password, PDO::PARAM_STR);
            $req->execute();
            $count = $req->rowCount();
            $row = $req->fetch(PDO::FETCH_ASSOC);
            if ($count == 1 && !empty($row)) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['email'] = $row['email'];

                return 'connected';

            } else {
                return "Invalid username and password!";
            }
        } catch (PDOException $e) {
            return "Error : " . $e->getMessage();
        }
    }


}

