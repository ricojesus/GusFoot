<?php
include_once("dal/Sql.php");
include_once("time.php");

class Partida{
    public function jogar($id_servidor, $id_liga, $temporada, $rodada, $id_time1, $id_time2){        
        $time1 = Time::getbyId($id_servidor, $id_time1);
        $time2 = Time::getbyId($id_servidor, $id_time2);
        $tempo = 0;

        var_dump($time1);
        //var_dump($time2);

        // calcular forca do time com base em cada uma das posições gol, defessa e ataque
        print_r(array_filter($time1->jogadores["tipo"],"G"));


    }
}