<?php
include_once("../dal/Sql.php");

class Servidor{
    public $id;
    public $nome;
    public $temporada;
    public $rodada;
    public $status;

	public function __construct($id = 0){
		if ($id != 0) {
			$result = $this->get("id_servidor = $id");
			if (count($result) > 0){
                $this->id = $result[0]["id_servidor"];
                $this->nome = $result[0]["nome"];
                $this->temporada = $result[0]["temporada"];
                $this->rodada = $result[0]["rodada"];
                $this->status = $result[0]["status"];
            }
        } else {
			$this->id = 0;
		}
    }

	public function create(){
		$sql = new Sql;

		try{
            $sql->query("INSERT INTO servidor (
                nome,
                temporada,
                rodada,
                status
            ) VALUES (
                :NOME,
                :TEMPORADA,
                :RODADA,
                :STATUS)",
            array(
                ':NOME' => $this->nome
            ));

            //Insere os times da base de dados

            //Insere os jogadores da base
 
		} catch (Exception $ex){
			throw new Exception($ex);
		}
	}    

	public static function list(){
		return (new self)->get();

	}

    public static function getbyId($id){        
		return (new self)->get("id_servidor = $id");
		
    }
    
    private function get($criteria = null){
		$sql = new Sql;

		$query = "SELECT id_servidor,
            nome,
            temporada,
            rodada,
            status
		FROM servidor WHERE 1=1";

		if (!is_null($criteria)){
			$query .= " and " . $criteria;
		}

		$query .= " ORDER BY nome";

		return $sql->select($query);
	}
}

?>