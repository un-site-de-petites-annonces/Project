<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Post</title>
</head>
<body>
<form action="PostController.php" method="post">

    <div class="container">
        <label for="username"><b>Username</b></label>
        <input type="email" placeholder="Enter email" name="email" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit" name="submitForm" value="se connecter">se connecter</button>

    </div>


</form>
</body>
</html>