 <?php

    require_once('../conexaoBanco/db.class.php');
    require_once('../conexaoBanco/conexao.php');
    session_start();
    $email = $_SESSION['email'];
    
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    $objDb = new db();
    $link = $objDb->conecta_mysql();
    $sql = "UPDATE usuario SET nome = '$nome', senha =  '$senha' WHERE email = '$email'";

    //executar a query
    if($conn->query($sql) === TRUE){
        echo "<script> 
            alert('Usuario Alterado com sucesso'); 
            window.location.href='../../paginas/usuario_empresas.php';
        </script>";
    }else{
        echo "<script>
            alert('Erro ao alterar o usuario');
            window.location.href='../../paginas/usuario_empresas.php';
        </script>";
    }

?>