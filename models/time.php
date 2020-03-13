<?php
include_once("../dal/Sql.php");
include_once("usuario.php");

class Time{
    public $nome;
	public $sigla;
	public $usuario
	public $escudo;

	public function __construct($id = 0){
		parent::__construct($id);
		if ($id != 0) {
			$result = $this->get("u.id_usuario = $id");
			if (count($result) > 0){
                $this->nome = $result[0]["nome"];
				$this->senha = $result[0]["sigla"];
				$this->escudo = $result[0]["escudo"];
				$this->usuario = new Usuario($result[0]["tipo"]);
			}
        }
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
				WHERE status != 1";

		if (!is_null($criteria)){
			$query .= " AND " . $criteria;
		}

		$query .= " ORDER BY nome";

		return $sql->select($query);
	}

}