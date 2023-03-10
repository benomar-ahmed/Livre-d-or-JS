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
        $this->msg_error = [];
        $this->login = $login;
        $this->password = $password;

        $requete = $this->pdo->prepare("SELECT id,login,password FROM utilisateurs WHERE login=:login and password=:password");
        $requete->execute(array(':login' => $login,':password' => $password));;
        $row = $requete->fetchall(PDO::FETCH_ASSOC);

        if($row == true){
            $_SESSION['id'] = $row[0]['id'];
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['password'] = $_POST['password'];
            $msg_error[]="Bonjour ".$_SESSION['login'];
        }

        else {
            
            $msg_error[]="Le login et/ou le mot de passe est incorrect !";
        }
        return $msg_error;
    }



    public function deconnexion()
    {
        session_destroy();
        header('Location: connexion.php');
    }


    public function update($login,$password)
    {
        $this->login = $login;
        $this->password = $password;

        $requete = $this->pdo->prepare("UPDATE utilisateurs SET login=:login,password =:password WHERE login=:login2");
        $requete->execute(array(':login' => $login, ':password' => $password, ':login2' => $_SESSION['login']));

    }


    public function listcomment()
    {
        // $requete = $this->pdo->prepare("SELECT DATE_FORMAT(`date`,'%d/%m/%Y'), `login`, `commentaire` FROM `utilisateurs` INNER JOIN `commentaires` WHERE utilisateurs.id = commentaires.id_utilisateur ORDER BY `date` DESC;");
        // $requete->execute();
        // $new_var = $requete->fetchAll();

        $requete2 = $this->pdo->prepare("SELECT DATE_FORMAT(`date`,'%d/%m/%Y'), `login`, `commentaire` FROM `utilisateurs` INNER JOIN `commentaires` WHERE utilisateurs.id = commentaires.id_utilisateur ORDER BY `date` DESC;");
        $requete2->execute();
        $new_var2 = $requete2->fetchAll(PDO::FETCH_ASSOC);

        if($new_var2 == false)
        {
            echo "Il n'y a aucun commentaire";
        }

        return $new_var2;
    }
        

    public function addcommentaire($commentaire,$id)
    {
        var_dump($id);
        $requete = $this->pdo->prepare("INSERT INTO `commentaires` (`commentaire`,`id_utilisateur`,`date`) VALUES (:commentaire,:id_utilisateur,NOW())");
        $new_var = $requete->execute(array('commentaire' => $commentaire, 'id_utilisateur' => $id));
        
        var_dump($new_var);
    }
}






?>
