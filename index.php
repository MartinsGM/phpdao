<?php

require_once 'config.php';

$sql = new Data();

//$usuarios = $sql->select("select * from usuario");
//echo json_encode($usuarios);

$user = new Usuario();

/* verifica se as variáveis foram alimentadas pelos getters
echo "<pre>";
print_r($user);
echo "</pre>";*/

//retorna usuário pelo id
//$user->findById(6);
//echo $user->__toString();

//retorna lista de todos os usuários
//$users = Usuario::findAll();
//echo json_encode($users);

//select com like
//$search = Usuario::search('a');
//echo json_encode($search);

//autenticação
$user = new Usuario();
$user->login('gabriel', '1212');
echo $user;