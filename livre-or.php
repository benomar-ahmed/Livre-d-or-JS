<?php

session_start();

require 'Classes/Users.php';

$livreor = new Users();
$livreor->livreor();



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
            <!-- <tbody>
                <?php
                // for ($i=0; isset($row[$i]) ; $i++) { 
                //     echo "<tr>";
                //     for ($j=0; isset($row[$i][$j]) ; $j++) 
                //     { 
                //         echo "<td>" . $row[$i][$j] . "</td>";
                //     }
                //     echo "</tr>";
                // }
                ?>
            </tbody> -->
        </table>
    </main>
</body>
</html>