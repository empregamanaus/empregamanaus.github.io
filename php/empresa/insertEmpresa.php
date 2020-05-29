<?php
include '../conexaoBanco/db_connection.php';
$conn = abrirBanco();

$sql = 'INSERT INTO empresa(cnpj, nomeEmpresa, endereco, dataAbertura, razaoSocial, ramoAtividade, situacaoFuncionamento, email, celular) VALUES (:Cnpj, :NomeEmpresa, :Endereco, :DataAbertura, :RazaoSocial, :RamoAtividade, :SituacaoFuncionamento, :Email, :Celular)';

$stmt = $conn->prepare($sql);
$stmt->bindValue(':Cnpj', '8683447');
$stmt->bindValue(':NomeEmpresa', 'Matrix&Cia');
$stmt->bindValue(':Endereco', 'Rua Das caveiras');
$stmt->bindValue(':DataAbertura', '2020-01-29');
$stmt->bindValue(':RazaoSocial', 'Where My Mind');
$stmt->bindValue(':RamoAtividade', 'consultaMental');
$stmt->bindValue(':SituacaoFuncionamento', 'Open');
$stmt->bindValue(':Email', 'TesteMental@hotmail.com');
$stmt->bindValue(':Celular', '92995330000');

if($stmt->execute()){
	echo "Salvo com Sucesso";
}
else{
	echo "Erro ao Salvar";
}
?>