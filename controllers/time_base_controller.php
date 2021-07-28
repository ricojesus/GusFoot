<?php
include_once ("../views/header.php");
include_once ("../models/time_base.php");

if (empty($_POST)){
    if (isset($_GET["action"])){
        switch ($_GET["action"]){
            case "edit":                 
                $time = new Time_base($_GET["id"]);

                include_once ("../views/time_edit.php");
                break;
            case "excluir":                
                $marca = new Marca($_GET["id"]);
                $marca->delete();

                $list = Marca::list();

                include_once ("../views/marca_list.php"); 
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