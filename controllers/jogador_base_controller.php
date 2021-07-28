<?php
include_once ("../views/header.php");
include_once ("../models/Jogador_base.php");
include_once ("../models/pais.php");
include_once ("../models/posicao.php");
include_once ("../models/time_base.php");

if (isset($_POST["btnGravar"])){
    $jogador = new Jogador_base();

	$jogador->id = $_POST['txtId'];
	$jogador->nome = $_POST['txtNome'];
	$jogador->forca = $_POST['txtForca'];
	$jogador->nascimento = $_POST['txtNascimento'];
	$jogador->posicao = new Posicao($_POST['cboPosicao']);
    $jogador->pais = new Pais($_POST['cboPais']);
    $jogador->time = new Time_base($_POST['cboTime']);

    //var_dump($jogador);

    $jogador->save();

    $list = Jogador_base::list();
    include_once ("../views/jogador_list.php");  
}

if (empty($_POST)){
    if (isset($_GET["action"])){
        switch ($_GET["action"]){
            case "edit":                 
                $jogador = new Jogador_base($_GET["id"]);
                $lstPais = Pais::list();
                $lstPosicao = Posicao::list();
                $lstTime = Time_base::list();

                include_once ("../views/jogador_edit.php");
                break;
            case "list";
                $list = Jogador_base::list();
                include_once ("../views/jogador_list.php"); 
                break;         
        };
    } else {
        $list = Jogador_base::list();
        include_once ("../views/jogador_list.php"); 
    }
}

include_once ("../views/footer.php");
?>