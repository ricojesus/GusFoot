<?php
//include_once("../dal/Sql.php");
include_once("posicao.php");
include_once("pais.php");
include_once("time_base.php");

class Jogador_base{
    public $id;
    public $nome;
	public $nascimento;
	public $forca;
	public $posicao;
	public $posicao_tipo;
	public $pais;
	public $time;
    public $status;

	public function __construct($id = 0){
		if ($id != 0) {
			$result = $this->get("id_jogador = $id");
			if (count($result) > 0){
                $this->id = $result[0]["id_jogador"];
                $this->nome = $result[0]["nome"];
				$this->nascimento = $result[0]["nascimento"];
				$this->forca = $result[0]["forca"];
				$this->posicao = new Posicao($result[0]["id_posicao"]);
				$this->pais = new Pais($result[0]["id_pais"]);
				$this->time = new Time_base($result[0]["id_time_base"]);
                $this->status = $result[0]["status"];
			}
        }
    }

	public function save(){
		$sql = new Sql;

		//var_dump($this);

		try{
			if ($this->id == 0){
				$query = "INSERT INTO jogador_base (
                    id_time_base,
                    id_pais,
					id_posicao,
					nome,
					nascimento,
					forca,
					status
				) VALUES ( " .
					$this->time->id . "," .
					$this->pais->id . ",'" .
					$this->posicao->id . "','" .
					$this->nome . "'," .
					$this->nascimento . "," .
					$this->forca . ",1)";

				$sql->query($query);
			} else {
				$query = "UPDATE jogador_base SET 
							nome='" . $this->nome  . "'," .
							"nascimento=" . $this->nascimento . "," .
							"forca=" . $this->forca . "," .
							"id_time_base=" . $this->time->id . "," .
							"id_pais=" . $this->pais->id . "," .
							"id_posicao='" . $this->posicao->id . "'" .
							" WHERE id_jogador = " . $this->id;

				$sql->query($query);
			}
		} catch (Exception $ex){
			throw new Exception($ex);
		}
	}   

	/*
	public function save(){
		$sql = new Sql;

		try{
			if ($this->id == 0){
				$sql->query("INSERT INTO jogador_base (
                    id_time_base,
                    id_pais,
					id_posicao,
					nome,
					nascimento,
					forca,
					status
				) VALUES (
					:ID_TIME_BASE,
                    :ID_PAIS,
					:ID_POSICAO,
					:NOME,
					:NASCIMENTO,
					:FORCA,
					:STATUS
				)",
				array(
					':ID_TIME_BASE' => $this->time->id,
                    ':ID_PAIS' => $this->pais->id,
					':ID_POSICAO' => $this->posicao->id,
					':NOME' => $this->nome,
					':NASCIMENTO' => $this->nascimento,
					':FORCA ' => $this->forca,
					':STATUS ' => 1
				));
			} else {
				$sql->query("UPDATE jogador_base SET 
					nome=:NOME,
                    nascimento=:NASCIMENTO,
                    forca=:FORCA,
					id_time_base=:ID_TIME_BASE,
					id_pais=:ID_PAIS,
					id_posicao=:ID_POSICAO
				WHERE id_jogador = :ID",
				array(
					':ID' => $this->id,
					':ID_TIME_BASE' => $this->time->id,
                    ':ID_PAIS' => $this->pais->id,
					':ID_POSICAO' => $this->posicao->id,
					':NOME' => $this->nome,
					':NASCIMENTO' => $this->nascimento,
					':FORCA ' => $this->forca
				));
			}
		} catch (Exception $ex){
			throw new Exception($ex);
		}
	}    

	*/
    
	public static function list(){        
		return (new self)->get();
    }

    public static function ListbyTime($id_time){        
		return (new self)->get("j.id_time_base = $id_time");
    }

    private function get($criteria = null){
		$sql = new Sql;

		$query = "SELECT id_jogador,
					j.id_pais, 
					j.id_posicao,
                    j.id_time_base,
					j.nome,
					p.nome nome_pais,
                    ps.posicao,
					nascimento,
					forca,
					ps.tipo,
					t.nome nome_time,
                    status
        		FROM Jogador_base j
				INNER JOIN posicao ps
				ON j.id_posicao = ps.id_posicao
				INNER JOIN pais p
				ON p.id_pais = j.id_pais
				INNER JOIN time_base t
				ON j.id_time_base = t.id_time_base
				WHERE 1= 1";

		if (!is_null($criteria)){
			$query .= " AND " . $criteria;
		}

		$query .= " ORDER BY j.nome";

		return $sql->select($query);
	}

}