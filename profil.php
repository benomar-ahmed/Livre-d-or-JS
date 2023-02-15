<?php

session_start();

require 'Classes/Users.php';

if(isset($_POST['submit']))
{
    $login = $_POST['login'];
    $password = $_POST['password'];

    $UpdateUser = new Users();
    $UpdateUser->update($login,$password);
}








?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<body>
    <header>
        <?php include 'header.php' ?>
    </header>

    <main>
        <h1>Profil</h1>

        <h3><?= "Vous pouvez modifiez votre login et votre password"."<br>".$_SESSION['login'];?></h3>
        
        <form action="" method="post">

            <label for="login">Votre login :</label>
            <input type="text" name="login" id="" placeholder=<?= $_SESSION['login']?>>

            <label for="password">Votre mot de passe :</label>
            <input type="password" name="password" id="">

            <input type="submit" value="Modifier" name="submit">
        </form>
    </main>
</body>
</html>