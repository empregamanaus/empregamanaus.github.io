<?php
include '../conexaoBanco/db_connection.php';
$conn = abrirBanco();

$sql = 'UPDATE empresa SET endereco = :Endereco, situacaoFuncionamento = :Status, email = :Email,
 celular = :Celular WHERE cnpj = :Cnpj';
$stmt = $conn->prepare($sql);
$stmt->bindValue(':Cnpj', '123');
$stmt->bindValue(':Endereco', 'teste.sa@hotmail.com');
$stmt->bindValue(':Status', 'teste1');
$stmt->bindValue(':Email', 'teste2');
$stmt->bindValue(':Celular', 'teste3');

if($stmt->execute()){
	echo "Atualizado com Sucesso";
}
else{
	echo "Erro ao Atualizar";
}
?>