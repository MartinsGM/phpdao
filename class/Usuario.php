<?php


class Usuario{
	

	private $id, $login, $senha, $dataCadastro;

	public function getId() {
	    return $this->id;
	}
	 
	public function setId($id) {
	    $this->id = $id;
	}

	public function getLogin() {
	    return $this->login;
	}
	 
	public function setLogin($login) {
	    $this->login = $login;
	}

	public function getSenha() {
	    return $this->senha;
	}
	 
	public function setSenha($senha) {
	    $this->senha = $senha;
	}

	public function getDataCadastro() {
	    return $this->dataCadastro;
	}
	 
	public function setDataCadastro($dataCadastro) {
	    $this->dataCadastro = $dataCadastro;
	}

	public function findById($id){

		$data = new Data();
		$sql = "SELECT * from usuario where id = :id";

		$result = $data->select($sql, array(
			":id"=>$id
		));

		if (count($result) > 0) {
			
			$this->setDados($result[0]);

		}

	}

	public static function findAll(){
		
		$data = new Data();

		$sql = "SELECT * from usuario";
		return $data->select($sql);
	}

	public static function search($login){

		$data = new Data();
		$sql = "SELECT * from usuario where login like :search";

		return $data->select($sql, array(
			':search'=>'%' . $login . '%'
		));

	}

	public function login($login, $pass){

		$data = new Data();
		$sql = "SELECT * from usuario where login = :login and senha = :pass";

		$result = $data->select($sql, array(
			":login"=>$login,
			":pass"=>$pass
		));

		if (count($result) > 0) {
			
			$this->setDados($result[0]);

		}else{
			throw new Exception("login ou senha inválido");		
		}

	}

	public function setDados($dados){

		$this->setId($dados['id']);	
		$this->setLogin($dados['login']);
		$this->setSenha($dados['senha']);
		$this->setDataCadastro(new DateTime($dados['data_cadastro']));

	}

	public function insert(){
		$data = new Data();

		$sql = "CALL user_insert(:login, :pass)";
		$result = $data->select($sql, array(
			':login'=>$this->getLogin(),
			':pass'=>$this->getSenha()
		));

		if (count($result) > 0) {
			$this->setDados($result[0]);
		}
	}

	public function update($login, $senha){

		$this->setLogin($login);
		$this->setSenha($senha);

		$data = new Data();
		$sql = "UPDATE usuario set login = :login, senha = :senha where id = :id";

		$data->query($sql, array(
			':login'=>$this->getLogin(),
			':senha'=>$this->getSenha(),
			':id'=>$this->getId()
		));
	}

	public function delete(){
		
		$data = new Data();
		$sql = "DELETE from usuario where id = :id";

		$data->query($sql, array(
			':id'=>$this->getId()
		));

		$this->setId(null);
		$this->setLogin(null);
		$this->setSenha(null);
		$this->setDataCadastro(null);
	}

	public function __construct($login ='', $senha = ''){
		$this->setLogin($login);
		$this->setSenha($senha);
	}

	public function __toString(){

		return json_encode(array(
			"id"=>$this->getId(),
			"login"=>$this->getLogin(),
			"senha"=>$this->getSenha(),
			"data_cadastro"=>$this->getDataCadastro()->format("d/m/Y H:i:s")
		));
	}
}