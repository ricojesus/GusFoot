<?php
include_once ("../views/header.php");
include_once ("../models/time_base.php");
include_once ("../models/pais.php");

if (isset($_POST["btnGravar"])){
    $time = new Time_base();

	$time->id = $_POST['txtId'];
	$time->nome = $_POST['txtNome'];
	$time->sigla = $_POST['txtSigla'];
    $time->pais = new Pais($_POST['cboPais']);

    //var_dump($time);

    $time->save();

    $list = Time_base::list();
    include_once ("../views/time_list.php");  
}

if (empty($_POST)){
    if (isset($_GET["action"])){
        switch ($_GET["action"]){
            case "edit":                 
                $time = new Time_base($_GET["id"]);
                $lstPais = Pais::list();

                include_once ("../views/time_edit.php");
                break;
            case "list";
                $list = Time_base::list();
                include_once ("../views/time_list.php"); 
                break;         
        };
    } else {
        $list = Time_base::list();
        include_once ("../views/time_list.php"); 
    }
}

include_once ("../views/footer.php");
?>