<?php

require 'Classes/Users.php';

if(isset($_POST['submit'])){

    $login = $_POST['login'];
    $password = $_POST['password'];
    $verify = $_POST['verify-password'];

    if($password == $verify){
        $newuser = new Users();
        $newuser->register($_POST['login'],$_POST['password']);
    }

    else {
        echo "Les mots de passe sont différents !";
    }

    
}




?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    
    <header>
        <?php require 'header.php' ?>
    </header>
    
    <main>
        <h1>Inscription</h1>

        <form action="" method="post">

            <label for="login">Votre Login :</label>
            <input type="text" name="login" required>

            <label for="password">Votre mot de passe :</label>
            <input type="password" name="password" id="" required>

            <label for="verify-password">Retapez votre mot de passe :</label>
            <input type="password" name="verify-password" id="" required>

            <input type="submit" value="Créer l'utilisateur" name="submit">

        </form>
    </main>
</body>
</html>