<?php
include_once ("../models/tabela_jogos.php");

if (isset($_GET["action"])){
    switch ($_GET["action"]){
        case "getRodada";
            echo json_encode(TabelaJogos::list());
            break;
    };
}
?>