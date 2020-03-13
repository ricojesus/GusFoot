<?php
include_once("../dal/Sql.php");

class Pais{
    public $id;
    public $nome;

	public function __construct($id = 0){
		if ($id != 0) {
			$result = $this->get("id_pais = $id");
			if (count($result) > 0){
                $this->id = $result[0]["id_pais"];
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
				$sql->query("INSERT INTO pais (
					nome
				) VALUES (
					:NOME				)",
				array(
                    ':NOME' => $this->nome
				));
			} else {
				$sql->query("UPDATE pais SET 
					nome=:NOME
				WHERE id_pais = :ID",
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
		return (new self)->get("id_pais = $id");
		
    }
    
    private function get($criteria = null){
		$sql = new Sql;

		$query = "SELECT id_pais,
            nome
		FROM pais WHERE 1=1";

		if (!is_null($criteria)){
			$query .= " and " . $criteria;
		}

		$query .= " ORDER BY nome";

		return $sql->select($query);
	}

}

?>