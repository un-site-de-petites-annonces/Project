<?php
     $user = 'ouss';
     $pwd = 'root';

    try {
        $db= new PDO('mysql:host=localhost;dbname=phproject', $user, $pwd);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
?>
