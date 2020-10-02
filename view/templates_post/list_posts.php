<?php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Mon blog</title>
</head>

<body>
<div>
    <h1>Mon blog</h1>
    <p>En construction</p>
    <?php
    require_once(__DIR__ . '/../../controller/PostController.php');
    $posts = (new PostController)->showPosts();
    foreach($posts as $post)
    {

      //  print_r($post);
        ?>
        <div>
            <h2><?= htmlspecialchars($post['title']);?></h2>
            <p><?= htmlspecialchars($post['content']);?></p>
            <p>Prix : <?= htmlspecialchars($post['price']);?></p>
        </div>
        <br>
        <?php
    }
    ?>
</div>
</body>
</html>