<?php

require_once 'config.php';

$sql = new Data();

$usuarios = $sql->select("select * from usuario");
echo json_encode($usuarios);