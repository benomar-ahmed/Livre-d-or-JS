<?php

session_start();
require 'Classes/User.php';
$newuser = new Users();
$newuser->deconnexion();


?>