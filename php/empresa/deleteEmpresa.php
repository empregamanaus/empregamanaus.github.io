<?php
include '../conexaoBanco/db_connection.php';
$conn = abrirBanco();

$sql = 'DELETE FROM empresa where cnpj = :Cnpj';

$stmt = $conn->prepare($sql);
$stmt->bindValue(':Cnpj', '8683447');

if($stmt->execute()){
	echo "Deletado com Sucesso";
}
else{
	echo "Erro ao Deletar";
}
?>