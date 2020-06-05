<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_vagas = "SELECT * FROM vagas WHERE id = '$id'";
$resultado_vagas = mysqli_query($conn, $result_vagas);
$row_vagas = mysqli_fetch_assoc($resultado_vagas);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Editar vagas</title>		
	</head>
	<body>

		<h1>Editar vagas</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="edit_vagas_proc.php">
			<input type="hidden" name="id" value="<?php echo $row_vagas['id']; ?>">
			
			<label>Nome: </label>
			<input type="text" name="nome" placeholder="Digite o nome da vaga" value="<?php echo $row_vagas['nome']; ?>"><br><br>

			<label>Tipo: </label>
			<input type="text" name="tipo" placeholder="Digite o tipo da vaga" value="<?php echo $row_vagas['tipo']; ?>"><br><br>

			<label>Numero de vagas: </label>
			<input type="text" name="NumeroVagas" placeholder="Digite o Numero de vagas" value="<?php echo $row_vagas['NumeroVagas']; ?>"><br><br>

			<label>Bairro: </label>
			<input type="text" name="bairro" placeholder="Digite o bairro" value="<?php echo $row_vagas['bairro']; ?>"><br><br>
			
			
			
			<input type="submit" value="Editar">
		</form>
	</body>
</html>