<?php
include '../conexaoBanco/db_connection.php';
$conn = abrirBanco();

$sql = "select * from empresa";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

foreach ($result as  $value) {
	echo 'NomeEmpresa: '.$value['nomeEmpresa'].' | Cnpj: '.$value['cnpj'].'<br>';
}
?>