<?php session_start() ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>New Post</title>
</head>
<body>
<form action="testcreate.php" method="post">
    <?php echo ('yoooo' . $_SESSION['username']); ?>

    <div class="container">
        <label for="title"><b>Titre</b></label>
        <input type="text" placeholder="Titre de l'annonce" name="title" required>

        <label for="content"><b>Contenu</b></label>
        <input type="text" placeholder="Contenu de l'annonce" name="content" required>

        <label for="content"><b>Price</b></label>
        <input type="text" placeholder="Prix de l'annonce" name="price" required>

        <label for="content"><b>Image</b></label>
        <input type="file" class="custom-file-input" id="imagePath" name="imagePath">

        <button type="submit" name="submitPost" value="valider">Valider</button>

    </div>
</form>
</body>
</html>