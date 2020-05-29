<?php
include '../conexaoBanco/db_connection.php';
$conn = abrirBanco();

$sql = 'DELETE FROM usuario where login = :Login';

$stmt = $conn->prepare($sql);
$stmt->bindValue(':Login', 'matrix');

if($stmt->execute()){
	echo "Deletado com Sucesso";
}
else{
	echo "Erro ao Deletar";
}
?>