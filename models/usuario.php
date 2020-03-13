<?php
include_once("../dal/Sql.php");
//include_once("../general/sendEmail.php");

class Usuario{
    public $nome;
	public $senha;
	public $email;
	public $tipo;

	public function __construct($id = 0){
		parent::__construct($id);
		if ($id != 0) {
			$result = $this->get("id_usuario = $id");
			if (count($result) > 0){
                $this->nome = $result[0]["nome"];
				$this->senha = $result[0]["senha"];
				$this->email = $result[0]["email"];
				$this->tipo = $result[0]["tipo"];
			}
        }
    }

	public static function setSession($id){
		$usuario = new Usuario($id);

		$_SESSION["id"] = $usuario->id; 
		$_SESSION["nome"] = $usuario->nome;
		$_SESSION["email"] = $usuario->email;  
		$_SESSION["tipo"] = $usuario->tipo;
	}

	public function valida_senha($password){
		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$number    = preg_match('@[0-9]@', $password);
	
		if(!$uppercase || !$lowercase || !$number || strlen($password) < 6) {
			return false;
		} else {
			return true;        
		}
	}	

	public function save(){
		$sql = new Sql;
		

		try{
			$result = $sql->select("select count(*) as contador from usuario where id_pessoa = $this->id");

			if ($result[0]["contador"] == 0){

				return $sql->query("INSERT INTO usuario (
					id_pessoa,
					nome,
					senha,
					id_email,
					reiniciar_senha,
					status
				) VALUES (
					:ID,
					:nome,
					:SENHA,
					:email,
					:REINICIAR_SENHA,
					:STATUS
				)",
				array(
					':ID' => $this->id,
					':nome' => $this->nome,
					':SENHA' => $this->senha,
					':email' => $this->email->id,
					':REINICIAR_SENHA' => 1,
					':STATUS' => $this->status
				));		

				// Não funcionou esse código e eu não achei o bug .. ainda
		        $email = new SendEmail($this->email,
		            "Definição de Senha de Acesso ao Sistema", 
		            SendEmail::redefinePasswordMail($this->id, $this->nome));

		        $email->send();				

			} else {
				$sql->query("UPDATE usuario SET 
                    nome=:nome,
					id_email=:email,
					reiniciar_senha:=:REINICIAR_SENHA,
					status=:STATUS
				WHERE id_pessoa = :ID",
				array(
					':ID' => $this->id,
					':nome' => $this->nome,
					':email' => $this->email->id,
					':REINICIAR_SENHA' => $this->reiniciar_senha,
					':STATUS' => $this->status
				));

				return $this->id;
		
			}

		} catch (Exception $ex){
			throw new Exception($ex);
		}
	}    

	public static function nome ($usuario, $senha){

		return (new self)->get("((nome = '" . $usuario . "' or p.email = '" . $usuario . "') and (senha = md5('" . $senha  .  "') or u.status = 0))");

	}

	public static function checkNewUserPassword ($usuario){

		$resultado = (new self)->get("((nome = '" . $usuario . "' or p.email = '" . $usuario . "') and u.reiniciar_senha = 1 and u.status = 1)");

		if (count($resultado) == 0){
			return new Usuario();
		} else {
			return new Usuario($resultado[0]["id_pessoa"]);
		}

	}

	public static function updatePassword($id, $password){
		$sql = new Sql;

		$sql->query("UPDATE usuario SET status=1, reiniciar_senha = 0, senha = md5(:SENHA)
            WHERE id_pessoa = :ID", array(
			':ID' => $id,
			':SENHA' => $password
		));
	}

    public function delete(){
		$sql = new Sql;

		$sql->query("UPDATE usuario SET status=2 
            WHERE id_pessoa = :ID", array(
			':ID' => $this->id
		));
	}

	public static function list(){
		return (new self)->get();
	}

    public static function getbyId($id){        
		return (new self)->get("id_pessoa = $id");
    }
	
    public static function getbyCongregacao($id_congregacao){        
		return (new self)->get("id_congregacao = $id_congregacao");
    }	

    public static function getbyIDCriptografado($id){        
	    $result = (new self)->get("md5(p.id_pessoa) = '" . $id . "'"); 
	    
	    if (count($result) > 0){
	        return new Usuario($result[0]["id_pessoa"]); 
	    }
    }

    private function get($criteria = null){
		$sql = new Sql;

		$query = "SELECT id_usuario,
					nome, 
					email,
                    senha,
					email,
					status
        		FROM usuario u
				WHERE u.status != 1";

		if (!is_null($criteria)){
			$query .= " AND " . $criteria;
		}

		$query .= " ORDER BY nome";

		//var_dump($query);


		return $sql->select($query);
	}

}

?>