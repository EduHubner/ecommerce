<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="POST">
        Login:<br>
        <input type="text" id="login" name="login">
        <br>
        Senha:<br>
        <input type="text" id="senha" name="senha">
        <br>
        <input type="submit" id="enviar" name="enviar" value="Enviar">
    </form>
    <?php
        include "autenticador.php";
    ?>
</body>
</html>