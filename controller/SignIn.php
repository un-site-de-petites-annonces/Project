<?php
ini_set('display_errors', '1');

require_once('../model/Connect.php');

$bdd = connect();

if(isset($_POST['sin'])) {

    $pseudo = htmlspecialchars($_POST['pseudo']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['email']);
    $mdp = md5($_POST['password']);
    $mdp2 = md5($_POST['password2']);
    if(!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['email2']) AND !empty($_POST['password']) AND !empty($_POST['password2'])) {
        $maxChar = strlen($pseudo);
        if($maxChar <= 255) {
                if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $getEmail = $bdd->prepare("SELECT * FROM users WHERE mail = ?");
                    $getEmail->execute(array($email));
                    $exist = $getEmail->rowCount();
                    if($exist == 0) {
                        if($mdp == $mdp2) {
                            $insert = $bdd->prepare("INSERT INTO users(username,firstname,lastname, email, password) VALUES(?, ?, ?, ?, ?)");
                            $insert->execute(array($pseudo, $firstname, $lastname, $email, $mdp));
                            echo  "Votre compte a bien été créé ! <a href=\"/phpProject/Project/view/login.html\">Me connecter</a>";
                        } else echo "Vos mots de passes ne correspondent pas !";

                    }else echo "Adresse mail déjà utilisée !";

                }else  echo "Votre adresse mail n'est pas valide !";

        } else echo "Votre pseudo ne doit pas dépasser 255 caractères !";

    } else echo "Tous les champs doivent être complétés !";


}
