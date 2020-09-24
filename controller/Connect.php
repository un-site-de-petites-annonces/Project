<?php

function connect()
{
    $user = 'ouss';
    $pwd = 'root';

    try {
        return new PDO('mysql:host=localhost;dbname=phproject', $user, $pwd);
    } catch (PDOException $e) {
        return "Erreur !: " . $e->getMessage() . "<br/>";
    }
}
