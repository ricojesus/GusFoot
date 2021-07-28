<?php
include_once("dal/Sql.php");
include_once("time.php");

class Partida{
    public function jogar($id_servidor, $id_liga, $temporada, $rodada, $id_time1, $id_time2){        
        $time1 = Time::getbyId($id_servidor, $id_time1);
        $time2 = Time::getbyId($id_servidor, $id_time2);
        $tempo = 0;
        $variacao_tempo=5;
        $posicao_bola=2;
        $gols_time1=0;
        $gols_time2=0;

        echo $time1->nome . " X " . $time2->nome . "</br>";

        echo "</br>";

        for($i=0; $i <= 90; $i++){

            $var_tempo = rand(1, $variacao_tempo);
            $tempo += $var_tempo;

            echo $tempo . " - ";

            if ($posicao_bola == 0){ //ataque time 2   
                $prob1 = intval(($time1->forca_gol / ($time1->forca_gol + $time2->forca_ataque)) * 100);
                $ganha_bola = rand(0, 100);

                if ($ganha_bola <= $prob1){
                    $posicao_bola = 1;

                    echo $time1->nome . " - defesa do goleiro";
                } else {
                    $posicao_bola = 2;

                    echo $time2->nome . " -  GOOOLLLLL ";
                    $gols_time2 ++;
                }
            } else if ($posicao_bola == 1){ //ataque time 2   
                $prob1 = intval(($time1->forca_defesa / ($time1->forca_defesa + $time2->forca_ataque)) * 100);
                $ganha_bola = rand(0, 100);

                if ($ganha_bola <= $prob1){
                    $posicao_bola = 2;

                    echo $time1->nome . " - recupera a bola na defesa";
                } else {
                    $posicao_bola = 0;

                    echo $time2->nome . " - chance de gol";
                }
            } else if ($posicao_bola == 2){ //meio campo   
                $prob1 = intval(($time1->forca_meio / ($time1->forca_meio + $time2->forca_meio)) * 100);
                $ganha_bola = rand(0, 100);

                if ($ganha_bola <= $prob1){
                    $posicao_bola = 3;

                    echo $time1->nome . " - ganha a bola e avança para o ataque";
                } else {
                    $posicao_bola = 1;

                    echo $time2->nome  . " - ganha a bola e avança para o ataque";
                }
            } else if ($posicao_bola == 3){ //ataque do time 1                
                $prob1 = intval(($time1->forca_ataque / ($time1->forca_ataque + $time2->forca_defesa)) * 100);
                $ganha_bola = rand(0, 100);

                if ($ganha_bola <= $prob1){
                    $posicao_bola = 4;

                    echo $time1->nome . " - ataque com chance de gol";
                } else {
                    $posicao_bola = 2;

                    echo $time2->nome . " - recupera a bola na defesa";
                }
            } else if ($posicao_bola == 4){ //chance de gol do time 1                
                $prob1 = intval(($time1->forca_ataque / ($time1->forca_ataque + $time2->forca_gol)) * 100);
                $ganha_bola = rand(0, 100);

                if ($ganha_bola <= $prob1){
                    $posicao_bola = 2;

                    echo $time1->nome . " - GOOOOOLLLLL ";
                    $gols_time1 ++;
                } else {
                    $posicao_bola = 3;

                    echo $time2->nome . " - defesa do goleiro";
                }
            }      
            
            echo "</br>";

            $i = $tempo;
        }
        echo "$tempo - fim de jogo";
        echo "</br>";


        echo $time1->nome . " $gols_time1 X $gols_time2 " . $time2->nome . "</br>";


    }
}