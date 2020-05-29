<?php
include '../conexaoBanco/db_connection.php';
$conn = abrirBanco();

 $sql = "select * from usuario where login = :login";
$stmt = $conn->prepare($sql);
$stmt->bindValue(":login", 'matrix');
$stmt->execute();
$result = $stmt->fetchAll();

foreach ($result as  $value) {
	echo 'Usuario: '.$value['login'].' | Senha: '.$value['senha'].' E-mail: '.$value['email'].'<br>';
}
?>