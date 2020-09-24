<?php

function connect()
{
    $user = 'ouss';
    $pwd = 'root';

    try {
        $db = new PDO('mysql:host=localhost;dbname=phproject', $user, $pwd);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $db;
    } catch (PDOException $e) {
        return "Erreur !: " . $e->getMessage() . "<br/>";
    }
}
