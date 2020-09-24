<?php
require_once('../model/Mysql.php');
session_start();

class UserController
{


    public function sign(){
        if(isset($_POST['sin'])) {

            $username  = htmlspecialchars($_POST['username']);
            $firstname = htmlspecialchars($_POST['firstname']);
            $lastname = htmlspecialchars($_POST['lastname']);
            $email = htmlspecialchars($_POST['email']);
            $mdp = md5($_POST['password']);
            $mdp2 = md5($_POST['password2']);
            if(!empty($_POST['username']) AND !empty($_POST['lastname'])AND !empty($_POST['firstname']) AND !empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['password2'])) {
                $maxChar = strlen($username);
                if($maxChar <= 255) {
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        if($mdp == $mdp2) {

                            $mysql = new Mysql();
                            if ($mysql->emailExist($email)) {
                                echo "Adresse mail déjà utilisée !";
                            } else {
                                $mysql->newUser($username, $firstname, $lastname, $email, $mdp);
                                echo "Votre compte a bien été créé ! <a href=\"/phpProject/Project/view/login.html\">Me connecter</a>";
                            }
                        }
                        else{
                            echo "Vos mots de passes ne correspondent pas !";
                        }

                    }else  echo "Votre adresse mail n'est pas valide !";

                } else echo "Votre pseudo ne doit pas dépasser 255 caractères !";

            } else echo "Tous les champs doivent être complétés !";


        }
    }
    /**
     * @return string
     */
    public function login(){

        if(isset($_POST['submitForm'])) {
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $db = new Mysql();
            $db = $db->login($email,$password);
            return $db;
        }
    }






}
