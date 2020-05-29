<?php
include '../conexaoBanco/db_connection.php';
$conn = abrirBanco();

$sql = 'INSERT INTO usuario(login, email, senha) VALUES (:Login, :Email, :Senha)';
$stmt = $conn->prepare($sql);
$stmt->bindValue(':Login', 'tteste');
$stmt->bindValue(':Email', 'aaadrianode.sa@hotmail.com');
$stmt->bindValue(':Senha', 'xx390');

if($stmt->execute()){
	echo "Salvo com Sucesso";
}
else{
	echo "Erro ao Salvar";
}
?>