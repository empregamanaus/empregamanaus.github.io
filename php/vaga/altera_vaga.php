 <?php
/*
    require_once('db.class.php');
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $objDb = new db();
    $link = $objDb->conecta_mysql();
    $sql = "UPDATE usuario SET nome = '$nome', senha =  '$senha') Where email = '$email'";

    //executar a query
    if(mysqli_query($link, $sql)){
        echo "Usuário registrado com sucesso!";
    }else{
        echo "Erro ao registrar o usuário!";
    }
*/
    require_once('../conexaoBanco/db.class.php');
    require_once('../conexaoBanco/conexao.php');
    session_start();
    
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $codigo = filter_input(INPUT_GET, 'codigo', FILTER_SANITIZE_NUMBER_INT);
    $nomeEmpresa = $_GET['nome'];

    $nome = $_POST['anuncio'];
    $tipo = $_POST['oferta'];
    $bairro = $_POST['bairro'];
    $descricao = $_POST['descricao'];
    $email = $_POST['emailcontato'];



    $result_vagas = "UPDATE vaga SET nomeAnuncio='$nome', tipoOferta='$tipo', emailContato='$email', bairro='$bairro', descricao='$descricao'  WHERE codigo='$codigo'";

    $resultado_vagas = mysqli_query($conn, $result_vagas);

    if(mysqli_affected_rows($conn)){
        echo "<script> 
                alert('vaga foi alterada com sucesso'); 
                window.location.href='../../paginas/empresa.php?id=$id&nome=$nomeEmpresa';
            </script>";
    }else{
        echo "<script> 
                alert('vaga não foi alterada com sucesso'); 
                window.location.href='../../paginas/empresa.php?id=$id&nome=$nomeEmpresa';
            </script>";
    }


?>