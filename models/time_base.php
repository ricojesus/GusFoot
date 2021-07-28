<?php
include_once("../dal/Sql.php");
include_once("jogador_base.php");
include_once("pais.php");

class Time_base{
    public $id;
    public $nome;
	public $sigla;
	public $escudo;
    public $pais;
	public $forca_gol;
	public $forca_defesa;
	public $forca_meio;
	public $forca_ataque;
	public $jogadores;

	public function __construct($id = 0){
		if ($id != 0) {
			$result = $this->get("id_time_base = $id");
			if (count($result) > 0){
                $this->id = $result[0]["id_time_base"];
                $this->nome = $result[0]["nome"];
				$this->sigla = $result[0]["sigla"];
                $this->pais = new Pais($result[0]["id_pais"]);
				$this->escudo = $result[0]["escudo"];
				$this->forca_gol = $result[0]["forca_gol"];
				$this->forca_defesa = $result[0]["forca_defesa"];
				$this->forca_meio = $result[0]["forca_meio"];
				$this->forca_ataque = $result[0]["forca_ataque"];
				//$this->jogadores = Jogador_base::ListbyTime($id);
			}
        }
    }

	public function save(){
		$sql = new Sql;

		try{
			if ($this->id == 0){
				$sql->query("INSERT INTO time_base (
					nome,
                    sigla,
                    id_pais
				) VALUES (
					:NOME,
                    :SIGLA,
                    :ID_PAIS
				)",
				array(
					':NOME' => $this->nome,
                    ':SIGLA' => $this->sigla,
                    ':ID_PAIS' => $this->pais->id
				));
			} else {
				$sql->query("UPDATE time_base SET 
					nome=:NOME,
                    sigla=:SIGLA,
                    id_pais=:ID_PAIS
				WHERE id_time_base = :ID",
				array(
					':ID' => $this->id,
					':NOME' => $this->nome,
                    ':SIGLA' => $this->sigla,
                    ':ID_PAIS' => $this->pais->id
				));
			}
		} catch (Exception $ex){
			throw new Exception($ex);
		}
	}    


	public static function list(){
		return (new self)->get();
	}	

	public static function getbyId($id_time){        
		return new Time($id_time);
    }

    private function get($criteria = null){
		$sql = new Sql;

		$query = "SELECT id_time_base,
						t.id_pais,
						p.nome nome_pais,
						t.nome,
						sigla,
						escudo,
						(select sum(forca)
							from jogador_base j
							inner join posicao p
							on j.id_posicao = p.id_posicao
							and p.tipo = 'G'
						where j.id_time_base = t.id_time_base ) as forca_gol,
						(select sum(forca)
							from jogador_base j
							inner join posicao p
							on j.id_posicao = p.id_posicao
							and p.tipo = 'D'
						where j.id_time_base = t.id_time_base ) as forca_defesa,          
						(select sum(forca)
							from jogador_base j
							inner join posicao p
							on j.id_posicao = p.id_posicao
							and p.tipo = 'M'
						where j.id_time_base = t.id_time_base ) as forca_meio,          
						(select sum(forca)
							from jogador_base j
							inner join posicao p
							on j.id_posicao = p.id_posicao
							and p.tipo = 'A'
						where j.id_time_base = t.id_time_base ) as forca_ataque          
					FROM time_base t
					INNER JOIN pais p
					ON t.id_pais = p.id_pais
					WHERE 1 = 1";

		if (!is_null($criteria)){
			$query .= " AND " . $criteria;
		}

		$query .= " ORDER BY nome";

		return $sql->select($query);
	}

}