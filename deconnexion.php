<?php

session_start();
require 'Classes/Users.php';
$newuser = new Users();
$newuser->deconnexion();


?>