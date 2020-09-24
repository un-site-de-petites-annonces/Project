<?php
     $user = 'ouss';
     $pwd = 'root';

    try {
        $db= new PDO('mysql:host=localhost;dbname=phproject', $user, $pwd);
        foreach($db->query('SELECT * from user') as $row) {
            print_r($row);
        }
        $db = null;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
?>
