<?php
include_once("../dal/Sql.php");
include_once("liga.php");

class Liga{
    public $id;
    public $liga;
    public $nome;

	public function __construct($id = 0){
		if ($id != 0) {
			$result = $this->get("id_liga = $id");
			if (count($result) > 0){
                $this->id = $result[0]["id_liga"];
                $this->pai = new Pais($result[0]["id_pais"]);
                $this->nome = $result[0]["nome"];
            }
        } else {
			$this->id = 0;
		}
    }

	public function save(){
		$sql = new Sql;

		try{

			if ($this->id == 0){
				$sql->query("INSERT INTO liga (
					id_pais,
					nome
				) VALUES (
					:PAIS,
					:NOME)",
				array(
                    ':PAIS' => $this->pais->id,
                    ':NOME' => $this->nome
				));
			} else {
				$sql->query("UPDATE liga SET 
					nome=:NOME
				WHERE id_liga = :ID",
				array(
					':ID' => $this->id,
                    ':NOME' => $this->nome
				));
			}
		} catch (Exception $ex){
			throw new Exception($ex);
		}
	}    

	public static function list(){
		return (new self)->get();

	}

    public static function getbyId($id){        
		return (new self)->get("id_liga = $id");
		
    }
    
    private function get($criteria = null){
		$sql = new Sql;

		$query = "SELECT id_liga,
			id_pais,
            nome
		FROM liga WHERE 1=1";

		if (!is_null($criteria)){
			$query .= " and " . $criteria;
		}

		$query .= " ORDER BY nome";

		return $sql->select($query);
	}

}

?>