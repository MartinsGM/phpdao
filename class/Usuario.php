<?php


class Usuario{
	
	function __construct()	{
		
	}

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

		$result = $data->select("select * from usuario where id = :id", array(
			":id"=>$id
		));

		if (count($result) > 0) {
			
			$row = $result[0];

			$this->setId($row['id']);
			$this->setLogin($row['login']);
			$this->setSenha($row['senha']);
			$this->setDataCadastro(new DateTime($row['data_cadastro']));

		}

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