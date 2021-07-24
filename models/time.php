<?php
//include_once("/dal/Sql.php");
include_once("jogador.php");

class Time{
    public $nome;
	public $sigla;
	public $escudo;
	public $jogadores;

	public function __construct($servidor = 0, $id = 0){
		if ($id != 0) {
			$result = $this->get("id_servidor = $servidor and id_time = $id");
			if (count($result) > 0){
                $this->nome = $result[0]["nome"];
				$this->sigla = $result[0]["sigla"];
				$this->escudo = $result[0]["escudo"];
				$this->jogadores = Jogador::ListbyTime($id);
			}
        }
    }

	public static function getbyId($id_servidor, $id_time){        
		return new Time($id_servidor, $id_time);
    }

    private function get($criteria = null){
		$sql = new Sql;

		$query = "SELECT id_time,
					id_servidor, 
					id_pais,
                    nome,
					sigla,
					escudo
        		FROM time
				WHERE 1 = 1";

		if (!is_null($criteria)){
			$query .= " AND " . $criteria;
		}

		$query .= " ORDER BY nome";

		return $sql->select($query);
	}

}