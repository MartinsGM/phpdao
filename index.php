<?php

require_once 'config.php';

$sql = new Data();

//$usuarios = $sql->select("select * from usuario");
//echo json_encode($usuarios);

$user = new Usuario();



$user->findById(6);

/*echo "<pre>";
print_r($user);
echo "</pre>";*/


echo $user->__toString();