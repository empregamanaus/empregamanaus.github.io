<?php
    require_once('../conexaoBanco/db.class.php');
    require_once('../conexaoBanco/conexao.php');
    session_start();
    $email = $_SESSION['email'];

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $codigo = filter_input(INPUT_GET, 'codigo', FILTER_SANITIZE_NUMBER_INT);
    $nomeEmpresa = $_GET['nome'];

    

    if($email){
        $sql = "DELETE FROM vaga WHERE codigo='$codigo'";
        if($conn->query($sql) === TRUE){
            echo "<script> 
                alert('Vaga apagada com sucesso'); 
                window.location.href='../../paginas/empresa.php?id=$id&nome=$nomeEmpresa';
            </script>";
        }else{

            echo "<script> 
                alert('vaga não foi apagada com sucesso'); 
                window.location.href='../../paginas/empresa.php?id=$id&nome=$nomeEmpresa';
            </script>";
        }
    }else{	
        echo "<script> 
                alert('Parece que você não está em uma sessão válida'); 
                window.location.href='../../index.html';
            </script>";
}