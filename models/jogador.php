<?php
//include_once("../dal/Sql.php");
include_once("posicao.php");

class Jogador{
    public $nome;
	public $nascimento;
	public $forca;
	public $posicao;
	public $pais;
    public $status;

	public function __construct($id = 0){
		parent::__construct($id);
		if ($id != 0) {
			$result = $this->get("u.id_usuario = $id");
			if (count($result) > 0){
                $this->nome = $result[0]["nome"];
				$this->nascimento = $result[0]["nascimento"];
				$this->forca = $result[0]["forca"];
				$this->posicao = new Posicao($result[0]["id_posicao"]);
				$this->pais = new Posicao($result[0]["id_pais"]);
                $this->status = $result[0]["status"];
			}
        }
    }

    public static function ListbyTime($id_time){        
		return (new self)->get("id_time = $id_time");
    }

    private function get($criteria = null){
		$sql = new Sql;

		$query = "SELECT id_jogador,
					id_pais, 
					id_posicao,
                    id_time,
                    nome,
					nascimento,
					forca,
                    status
        		FROM Jogador

				WHERE 1= 1";

		if (!is_null($criteria)){
			$query .= " AND " . $criteria;
		}

		$query .= " ORDER BY nome";

		return $sql->select($query);
	}

}