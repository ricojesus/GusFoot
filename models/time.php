<?php
//include_once("/dal/Sql.php");
include_once("jogador.php");

class Time{
    public $nome;
	public $sigla;
	public $usuario;
	public $escudo;
	public $jogadores;

	public function __construct($id = 0){
		if ($id != 0) {
			$result = $this->get("id_time = $id");
			if (count($result) > 0){
                $this->nome = $result[0]["nome"];
				$this->sigla = $result[0]["sigla"];
				$this->escudo = $result[0]["escudo"];
				$this->usuario = new Usuario($result[0]["tipo"]);
				$this->jogadores = Jogador::ListbyTime($id);
			}
        }
    }

	public static function getbyId($id_time){        
		return (new self)->get("id_time = $id_time");
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