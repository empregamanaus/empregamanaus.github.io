<?php
	
	session_start();

	if(!isset($_SESSION['email'])){
		header('Location: index.html?erro=1');
	}

  echo "Usuario autenticado com sucesso!!!!";
?>

