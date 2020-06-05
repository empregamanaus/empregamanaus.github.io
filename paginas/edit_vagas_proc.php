<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
$NumeroVagas = filter_input(INPUT_POST, 'NumeroVagas', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);


$result_vagas = "UPDATE vagas SET nome='$nome', tipo='$tipo', NumeroVagas='$NumeroVagas', bairro='$bairro', modified=NOW() WHERE id='$id'";
$resultado_vagas = mysqli_query($conn, $result_vagas);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Vaga editada com sucesso</p>";
	header("Location: listar.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Vaga não foi editada com sucesso</p>";
	header("Location: edit_vagas.php?id=$id");
}
