<?php

session_start();

if(isset($_SESSION['lastname'])){
    echo 'bonjour '.$_SESSION['lastname'];
}else{
    echo 'coucou';
    header('login.html');
}
