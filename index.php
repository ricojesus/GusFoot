<?php

(session_status() == PHP_SESSION_NONE)?session_start():null;

// Faz o set de duracao em segundos
//ini_set('session.gc_maxlifetime', 3600);

// Seta o cookie em segundos
//session_set_cookie_params(3600);   

//include_once("../controllers/login_controller.php");
include_once("views/header.php");
//include_once("views/dashboard.php"); 
include_once("views/footer.php");

?>