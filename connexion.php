<?php

session_start();
require 'Classes/Users.php';


if(isset($_POST['submit'])){

    $login = $_POST['login'];
    $password = $_POST['password'];


    $connectuser = new Users();
    $connectuser->connect($login,$password);

    foreach($var_return as $message){
        echo $message;
    }
}





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>



    <form action="" method="post">

            <label for="login">Votre Login :</label>
            <input type="text" name="login" required>

            <label for="password">Votre mot de passe :</label>
            <input type="password" name="password" id="" required>

            <input type="submit" value="Créer l'utilisateur" name="submit">
    </form>
</body>
</html>