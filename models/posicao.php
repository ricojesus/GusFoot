<?php
//include_once("../dal/Sql.php");

class Posicao{
    public $id;
    public $posicao;
    public $tipo;

	public function __construct($id = ""){
		if ($id != "") {
			$result = $this->get("id_posicao = '" . $id . "'");
			if (count($result) > 0){
                $this->id = $result[0]["id_posicao"];
                $this->posicao = $result[0]["posicao"];
                $this->tipo = $result[0]["tipo"];
            }
        } else {
			$this->id = 0;
		}
    }

	public function save(){
		$sql = new Sql;

		try{

			if ($this->id == 0){
				$sql->query("INSERT INTO Posicao (
					posicao,
                    tipo
				) VALUES (
					:POSICAO				
                    :TIPO)",
				array(
                    ':POSICAO' => $this->posicao,
                    ':TIPO' => $this->tipo
				));
			} else {
				$sql->query("UPDATE Posicao SET 
					posicao=:POSICAO,
                    tipo=:TIPO
				WHERE id_posicao = :ID",
				array(
					':ID' => $this->id,
                    ':POSICAO' => $this->posicao,
                    ':TIPO' => $this->tipo

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
		return (new self)->get("id_posicao = $id");
		
    }
    
    private function get($criteria = null){
		$sql = new Sql;

		$query = "SELECT id_posicao,
            posicao,
            tipo
		FROM Posicao WHERE 1=1";

		if (!is_null($criteria)){
			$query .= " and " . $criteria;
		}

		$query .= " ORDER BY posicao";

		return $sql->select($query);
	}

}

?>