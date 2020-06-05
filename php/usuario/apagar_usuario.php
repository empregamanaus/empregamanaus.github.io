<?php
    require_once('../conexaoBanco/db.class.php');
    require_once('../conexaoBanco/conexao.php');
    session_start();
    $email = $_SESSION['email'];

if($email){
	$sql = "DELETE FROM usuario WHERE email='$email'";
	if($conn->query($sql) === TRUE){
        session_destroy();
		echo "<script> 
            alert('Usuario Apagado com sucesso'); 
            window.location.href='../../index.html';
        </script>";
	}else{
		
		echo "<script> 
            alert('Usuario não foi apagado com sucesso'); 
            window.location.href='../../paginas/usuario_empresas.php';
        </script>";
	}
}else{	
	echo "<script> 
            alert('Parece que você não está em uma sessão válida'); 
            window.location.href='../../index.html';
        </script>";
}
