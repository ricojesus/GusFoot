<?php
include_once("dal/Sql.php");
include_once("time.php");

class Partida{
    public function jogar($id_servidor, $id_liga, $temporada, $rodada, $id_time1, $id_time2){
        $time1 = Time::getbyId($id_time1);
        $time2 = Time::getbyId($id_time2);

        echo "rodou";


    }
}