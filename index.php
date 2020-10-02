<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
</head>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Mes annonces</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/Projet PHP/Project/index.php">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/Projet PHP/Project/view/new_post.php">Créer une annonce</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   Compte
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php
                    if(isset($_SESSION['lastname'])){
                        echo "<a class='dropdown-item' href='view/SignIn.php'>Profil</a>";
                        echo  '<a class="dropdown-item" href="view/CallLogout.php">Se Déconnecter</a>';
                    }else{
                        echo "<a class='dropdown-item' href='view/SignIn.php'> Créer un compte</a>";
                        echo  '<a class="dropdown-item" href="view/login.html">Se connecter</a>';
                    }
                    ?>

                </div>
            </li>

        </ul>

    </div>
</nav>




<div class="col-md-6 m-auto">
    <h1>
<?php

if(isset($_SESSION['lastname'])){
    echo 'bonjour '.$_SESSION['lastname'];
}else{
    echo 'coucou';
    header('login.html');
}
?></h1>
</div>
<div class="page-block col-md-12">
<?php
    require_once(__DIR__ . '/controller/PostController.php');
    $posts = (new PostController)->showPosts();
    foreach($posts as $post)
    {
      //  print_r($post);
        ?>
            <div class="card" style="width: 18rem;">
            <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($post['title']);?></h5>
            <p class="card-text"><?= htmlspecialchars($post['price']);?></p>
            <a class="btn btn-primary" href="view/CallShowPost.php?action=showPost&amp;id=<?= $post['id'] ?>">Voir le détail</a>
        </div>
    </div>
        <?php
    }
    ?>





</div>



</body>
</html>


