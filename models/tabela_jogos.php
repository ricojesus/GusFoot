<?php
include_once("dal/Sql.php");

class TabelaJogos{
    public $id;
	public $servidor;
	public $liga;
	public $temporada;
	public $rodada;
	public $time1;
	public $time2;
	public $gols_time1;
	public $gols_time2;

	public function __construct($id = 0){
		if ($id != 0) {
			$result = $this->get("id_jogo = $id");
			if (count($result) > 0){
                $this->id = $result[0]["id_jogo"];
				$this->servidor = $result[0]["id_servidor"];
				$this->liga = $result[0]["id_liga"];
				$this->temporada = $result[0]["temporada"];
				$this->rodada = $result[0]["rodada"];
				$this->time1 = $result[0]["id_time_casa"];
				$this->time2 = $result[0]["id_time_visitante"];
				$this->gols_time1 = $result[0]["gols_time_casa"];
				$this->gols_time2 = $result[0]["gols_time_vistante"];
			}
        }
    }

    public static function list(){
		return (new self)->get();
	}

    private function get($criteria = null){
		$sql = new Sql;

		$query = "SELECT tj.id_jogo,
					tj.id_servidor, 
					tj.id_liga,
                    tj.temporada,
					tj.rodada,
					tj.id_time_casa,
					t1.nome as nome_time_casa,
					tj.id_time_visitante,
					t2.nome as nome_time_visitante,
					tj.gols_time_casa,
					tj.gols_time_visitante,
					tj.status
        		FROM tabela_jogos tj 
        			INNER JOIN time t1
        			ON tj.id_time_casa = t1.id_time
        			INNER JOIN time t2
        			ON tj.id_time_visitante = t2.id_time";

		if (!is_null($criteria)){
			$query .= " WHERE " . $criteria;
		}

		$query .= " ORDER BY id_jogo";

		return $sql->select($query);
	}

}