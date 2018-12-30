<?php

spl_autoload_register(function($className){
	
	$dir_class = 'class';
	$filename = $dir_class . DIRECTORY_SEPARATOR . $className . ".php";

	if (file_exists($filename)) {
		require_once $filename ;
		//var_dump($filename);	
	}

});	