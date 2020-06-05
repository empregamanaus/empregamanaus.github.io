<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Apagar Vagas</title>		
	</head>
	<body>
		
		<h1>Apagar Vagas</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		
		
		
		$result_vagas = "SELECT * FROM vagas";
		$resultado_vagas = mysqli_query($conn, $result_vagas);
		while($row_vagas = mysqli_fetch_assoc($resultado_vagas)){
			echo "nome: " . $row_vagas['nome'] . "<br>";
			echo "tipo: " . $row_vagas['tipo'] . "<br>";
			echo "NumeroVagas: " . $row_vagas['NumeroVagas'] . "<br>";
			echo "bairro: " . $row_vagas['bairro'] . "<br>";
			echo "<a href='apagar_vagas.php?id=" . $row_vagas['id'] . "'>Apagar</a><br><hr>";


		}
	
		
		?>		
	</body>
</html>