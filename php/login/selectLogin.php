<?php
include '../conexaoBanco/db_connection.php';
$conn = abrirBanco();

$sql = "select * from usuario";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

foreach ($result as  $value) {
	echo 'Usuario: '.$value['login'].' | Senha: '.$value['senha'].'<br>';
}
?>