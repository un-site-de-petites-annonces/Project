<?php
require_once('controller/Connect.php');

$bdd = connect();
print_r($bdd);die;
if(isset($_POST['forminscription'])) {

    $pseudo = htmlspecialchars($_POST['pseudo']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['email']);
    $mdp = sha1($_POST['password']);
    $mdp2 = sha1($_POST['password2']);
    if(!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['email2']) AND !empty($_POST['password']) AND !empty($_POST['password2'])) {
        $maxChar = strlen($pseudo);
        if($maxChar <= 255) {
                if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $getEmail = $bdd->prepare("SELECT * FROM users WHERE mail = ?");
                    $getEmail->execute(array($email));
                    $exist = $getEmail->rowCount();
                    if($exist == 0) {
                        if($mdp == $mdp2) {
                            $insert = $bdd->prepare("INSERT INTO users(pseudo,firstname,lastname, email, password) VALUES(?, ?, ?, ?, ?)");
                            $insert->execute(array($pseudo, $firstname, $lastname, $email, $mdp));
                            return  "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                        } else return "Vos mots de passes ne correspondent pas !";

                    }else return "Adresse mail déjà utilisée !";

                }else  return "Votre adresse mail n'est pas valide !";

        } else return "Votre pseudo ne doit pas dépasser 255 caractères !";

    } else return "Tous les champs doivent être complétés !";


}
