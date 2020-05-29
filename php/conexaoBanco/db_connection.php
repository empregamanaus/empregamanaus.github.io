<?php

 function abrirBanco(){
   	 $dbhost = "mysql:host=localhost;dbname=empregos;charset=utf8";
	 $dbuser = "appjavafx";
	 $dbpass = "app1java2fx3";
	 $conn = new PDO($dbhost, $dbuser, $dbpass) or die("Falha na Conexão: %s\n". $conn -> error);
	 return $conn;
 }

?>
