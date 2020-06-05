<?php
    session_start();
    require_once('../conexaoBanco/db.class.php');

    $cnpj = $_POST['cnpj'];
    $nomeEmpresa = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $dataAbertura = $_POST['dataabertura'];
    $razaoSocial = $_POST['razaosocial'];
    $ramoAtividade = $_POST['ramoatividade'];
    $situacaoFuncionamento = $_POST['sitfunc'];
    $email = $_SESSION['email'];
    $celular = $_POST['telefone1']; //Depois tem que verificar direitinho se as tags aki batem com os nomes no formulário.


    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $sql = "INSERT INTO empresa (cnpj, nomeEmpresa, endereco, dataAbertura, razaoSocial, ramoAtividade, situacaoFuncionamento, celular, emailUsuario) VALUES ('$cnpj','$nomeEmpresa','$endereco','$dataAbertura','$razaoSocial','$ramoAtividade','$situacaoFuncionamento', '$celular', '$email')";

    //executar a query
    if(mysqli_query($link, $sql)){
        echo "<script> 
        alert('Empresa registrada com sucesso!'); 
        window.location.href='../../paginas/usuario_empresas.php';
        </script>";
    }else{
        echo "<script> 
        alert('Algo deu errado durante o registro da empresa.'); 
        window.location.href='../../paginas/usuario_empresas.php';
        </script>";
    }

?>