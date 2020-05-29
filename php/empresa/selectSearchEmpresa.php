<?php
include '../conexaoBanco/db_connection.php';
$conn = abrirBanco();

 $sql = "select * from empresa where cnpj = :Cnpj";
$stmt = $conn->prepare($sql);
$stmt->bindValue(":Cnpj", '123');
$stmt->execute();
$result = $stmt->fetchAll();

foreach ($result as  $value) {
	echo 'NomeEmpresa: '.$value['nomeEmpresa'].' | Cnpj: '.$value['cnpj'].' E-mail: '.$value['email'].'<br>';
}
?>