<?php 
require('../index.php');
?>

<body>
<form action="testcreate.php" method="post" enctype="multipart/form-data">

    <div class="container">
        <label for="title"><b>Titre</b></label>
        <input type="text" placeholder="Titre de l'annonce" name="title" required>

        <label for="content"><b>Contenu</b></label>
        <input type="text" placeholder="Contenu de l'annonce" name="content" required>

        <label for="price"><b>Price</b></label>
        <input type="text" placeholder="Prix de l'annonce" name="price" required>

        <label for="image"><b>Image</b></label>
        <input type="file" name="image" required>

        <button type="submit" name="submitPost" value="valider">Valider</button>

    </div>
</form>
</body>
</html>