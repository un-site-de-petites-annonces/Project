<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>New Post</title>
</head>
<body>
<form action="testcreate.php" method="post">

    <div class="container">
        <label for="title"><b>Titre</b></label>
        <input type="text" placeholder="Titre de l'annonce" name="title" required>

        <label for="content"><b>Contenu</b></label>
        <input type="text" placeholder="Contenu de l'annonce" name="content" required>

        <label for="content"><b>Price</b></label>
        <input type="text" placeholder="Prix de l'annonce" name="price" required>

        <button type="submit" name="submitForm" value="valider">Valider</button>

    </div>
</form>
</body>
</html>