<?php

class users {
   
    private $id;
    public $login;
    public $password;
    public $email;
    public $firstname;
    public $lastname;
    public $pdo;
    public $msg_error;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=livreorjs;charset=utf8','root','');
    }

    public function register($login,$password,$email,$firstname,$lastname)
    {
        $this->login = $login;
        $this->password = $password;
        $this->email =  $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;

        $requete = $this->pdo->prepare("SELECT login FROM utilisateurs WHERE login=:login");
        $requete->execute(array(':login' => $login));
        $new_var = $requete->fetchall(PDO::FETCH_ASSOC);

        if($new_var == true)
        {
            echo "L'utilisateur existe déjà !";
        }

        else 
        {
            $requete2 = $this->pdo->prepare("INSERT INTO utilisateurs (`login`,`password`,`email`,`firstname`,`lastname`) VALUES (?,?,?,?,?)");
            $requete2->execute(array('$login','$password','$email','$firstname','$lastname'));
            echo "Tu es connexté !";

        }

    }


    // public function connec()
    // {

    // }
}






?>
