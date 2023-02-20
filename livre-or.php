<?php

session_start();

require 'Classes/Users.php';


// $pdo = new PDO('mysql:host=localhost;dbname=livreorjs;charset=utf8','root','');
// $requete2 = $pdo->prepare("SELECT DATE_FORMAT(`date`,'%d/%m/%Y'), `login`, `commentaire` FROM `utilisateurs` INNER JOIN `commentaires` WHERE utilisateurs.id = commentaires.id_utilisateur ORDER BY `date` DESC;");
// $requete2->execute();
// $new_var2 = $requete2->fetchAll(PDO::FETCH_ASSOC);
// var_dump($new_var2);

// if($new_var2 == false)
// {
//     echo "Il n'y a aucun commentaire";
// }



$livreorphp = new Users();
$livreorphp->listcomment();

$livreorlist = $livreorphp->listcomment();
var_dump($livreorlist);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre d'or</title>
</head>
<body>
    <header>
        <?php include 'header.php'; ?>
    </header>

    <main>

        <h1>Livre d'or</h1>
        <table>
            <thead>
                <th>Posté le :</th>
                <th>Par l'utilisateur :</th>
                <th>Commentaires</th>
            </thead>
            <tbody>
                <?php
                    foreach($livreorlist as $comment){
                        echo "<tr>";
                        foreach ($comment as $key => $value) {
                            echo "<td>" . $value . "</td>";
                        }
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>