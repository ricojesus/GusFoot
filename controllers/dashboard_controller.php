<?php
include_once ("../views/header.php");
/*
include_once ("../models/dashboard.php");

$dashModel = new Dashboard();

// Membros da VA
$pilotosAtivos = $dashModel->countPilots('(activation = 1 and gg.status = 1)');
$pilotosAspirantes = $dashModel->countPilots('(activation = 1 and gg.status = 1 and rank_id = 2)');
$pilotosAfastados = $dashModel->countPilots('(activation = 1 and gg.status = 2)'); // Incorreto. Pendente de resolução
$removalToAprove = $dashModel->countRemovalsToAprove();

// Operacional

$tiposdeaeronave = $dashModel->countFleetTypes();
$qtderotas = $dashModel->countRoutes();
$qtdetours = $dashModel->countTours();
$qtdehubs = $dashModel->countHubs();
*/
include_once ("../views/dashboard_view.php"); 


include_once ("../views/footer.php");
?>


