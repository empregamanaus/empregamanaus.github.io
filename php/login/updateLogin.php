<?php
include '../conexaoBanco/db_connection.php';
$conn = abrirBanco();

$sql = 'UPDATE usuario SET email = :Email, senha = :Senha WHERE login = :Login';
$stmt = $conn->prepare($sql);
$stmt->bindValue(':Login', 'matrix');
$stmt->bindValue(':Email', 'teste.sa@hotmail.com');
$stmt->bindValue(':Senha', 'teste');

if($stmt->execute()){
	echo "Atualizado com Sucesso";
}
else{
	echo "Erro ao Atualizar";
}
?>