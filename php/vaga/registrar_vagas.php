<?php

    require_once('../conexaoBanco/db.class.php');
    require_once('../conexaoBanco/conexao.php');
    session_start();
    
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $nomeEmpresa = $_GET['nome'];

    $nome = $_POST['anuncio'];
    $tipo = $_POST['oferta'];
    $bairro = $_POST['bairro'];
    $descricao = $_POST['descricao'];
    $email = $_POST['emailcontato'];

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $sql = "INSERT INTO vaga (idEmpresa,nomeAnuncio, tipoOferta, bairro,descricao,emailContato) VALUES ('$id','$nome', '$tipo', '$bairro', '$descricao','$email')";

    //executar a query
    if(mysqli_query($link, $sql)){
       echo "<script> 
            alert('Vaga registrada com sucesso'); 
            window.location.href='../../paginas/empresa.php?id=$id&nome=$nomeEmpresa';
        </script>";
    }else{
        echo "<script> 
            alert('Erro ao registrar vaga'); 
            window.location.href='../../paginas/empresa.php?id=$id&nome=$nomeEmpresa';
        </script>";
    }

?>