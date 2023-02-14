<?php

class Users {
   
    private $id;
    private $login;
    private $password;
    public $pdo;
    public $msg_error;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=livreorjs;charset=utf8','root','');
    }

    public function register($login,$password)
    {
        $this->login = $login;
        $this->password = $password;

        $requete = $this->pdo->prepare("SELECT login FROM utilisateurs WHERE login=:login");
        $requete->execute(array(':login' => $login));
        $new_var = $requete->fetchall(PDO::FETCH_ASSOC);

        if($new_var == true)
        {
            echo "L'utilisateur existe déjà !";
        }

        else 
        {
            $requete2 = $this->pdo->prepare("INSERT INTO utilisateurs (`login`,`password`) VALUES (:login,:password)");
            $requete2->execute(array(':login' => $login,':password' => $password));
            echo "Tu es connecté !";
            header('Location: connexion.php');
        }

    }


    public function connect($login,$password)
    {
        $this->login = $login;
        $this->password = $password;

        $requete = $this->pdo->prepare("SELECT login and password FROM utilisateurs ");
    }
}






?>
