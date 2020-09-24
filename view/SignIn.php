
<html>
<head>
    <title>Inscription</title>
    <meta charset="utf-8">
</head>
<body>
<div align="center">
    <h2>Inscription</h2>
    <br /><br />
    <form method="POST"  action="CallSign.php">
        <table>
            <tr>
                <td align="right">
                    <label for="pseudo">Pseudo :</label>
                </td>
                <td>
                    <input type="text" placeholder="Votre pseudo" id="pseudo" name="username"  />
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="pseudo">firstname :</label>
                </td>
                <td>
                    <input type="text" placeholder="Votre prénom" id="firstname" name="firstname" value="" />
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="pseudo">lastname :</label>
                </td>
                <td>
                    <input type="text" placeholder="Votre nom" id="lastname" name="lastname" value="" />
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="mail">Mail :</label>
                </td>
                <td>
                    <input type="email" placeholder="Votre mail" id="mail" name="email" value="" />
                </td>
            </tr>

            <tr>
                <td align="right">
                    <label for="mdp">Mot de passe :</label>
                </td>
                <td>
                    <input type="password" placeholder="Votre mot de passe" id="mdp" name="password" />
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="mdp2">Confirmation du mot de passe :</label>
                </td>
                <td>
                    <input type="password" placeholder="Confirmez votre mdp" id="mdp2" name="password2" />
                </td>
            </tr>
            <tr>
                <td></td>
                <td align="center">
                    <br />
                    <input type="submit" name="sin" value="Je m'inscris" />
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>