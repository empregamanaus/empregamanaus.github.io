<?php
session_start();
include_once("../conexaoBanco/conexao.php");

$id = $_GET['id'];
if($id){
    //deletar vagas primeiro 
    $result_vagas = "DELETE FROM vaga WHERE idEmpresa='$id'";
	$resultado_vagas = mysqli_query($conn, $result_vagas);
    if($conn->query($result_vagas) === TRUE){
        
        $result_vagas = "DELETE FROM empresa WHERE idEmpresa='$id'";
        $resultado_vagas = mysqli_query($conn, $result_vagas);
        if($conn->query($result_vagas) === TRUE){
            echo "<script> 
                    alert('Empresa apagada com sucesso'); 
                    window.location.href='../../paginas/usuario_empresas.php';
                </script>";
        }else{

            echo "<script> 
                    alert('Empresa não foi apagada com sucesso'); 
                    window.location.href='../../paginas/usuario_empresas.php';
                </script>";
        }
    }else{	
	    echo "<script> 
                alert('As vagas foram excluidas mas não a empresa'); 
                window.location.href='../../paginas/usuario_empresas.php';
        </script>";
    }    
}else{	
	echo "<script> 
                alert('Necessário selecionar uma empresa'); 
                window.location.href='../../paginas/usuario_empresas.php';
            </script>";
}
?>