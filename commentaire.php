<?php

session_start();

require 'Classes/Users.php';

if(isset($_POST['submit'])){

    $id = (int)$_SESSION['id'];
    $commentaire = $_POST['commentaire'];

    $new_comment = new Users();
    $new_comment->addcommentaire($commentaire,$id);



    
}






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commentaires</title>
</head>
<body>
    <header>
        <?php include 'header.php'; ?>
    </header>

    <main>
        <span><?php echo "Vous êtes actuellement connecté sous le nom de : ".$_SESSION['login'] ?></span>

        <h1>Ajout de commentaire </h1>
        <form action="" method="post" id="">
            <label for="commentaire">Entrez votre commentaire :</label>
            <input type="text" name="commentaire">

            <input type="submit" value="Envoyez le commentaire"name="submit">
        </form>
    </main>
</body>
</html>