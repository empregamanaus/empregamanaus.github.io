 <?php

    require_once('../conexaoBanco/db.class.php');
    require_once('../conexaoBanco/conexao.php');
   
    $idEmpresa = $_POST['idEmpresa'];
    $nomeEmpresa = $_POST['nomeEmpresa'];
    $cnpj = $_POST['cnpj'];
    $endereco = $_POST['endereco'];
    $dataAbertura = $_POST['dataabertura'];
    $razaoSocial = $_POST['razaosocial'];
    $ramoAtividade = $_POST['ramoatividade'];
    $situacaoFuncionamento = $_POST['situacaofuncionamento'];
    $celular = $_POST['telefone1'];
    
    
    $objDb = new db();
    $link = $objDb->conecta_mysql();
    $sql = "UPDATE empresa SET nomeEmpresa = '$nomeEmpresa',cnpj = '$cnpj', endereco = '$endereco', dataAbertura = '$dataAbertura', razaoSocial='$razaoSocial', ramoAtividade = '$ramoAtividade', situacaoFuncionamento = '$situacaoFuncionamento' ,celular =  '$celular' Where idEmpresa = '$idEmpresa'";

    //executar a query
    if($conn->query($sql) === TRUE){
            echo '<script language="javascript">';
            echo 'alert("Empresa alterada com sucesso")';
            echo '</script>';
        

           header('Location: ../../paginas/usuario_empresas.php');
    }else{
        
        

           header('Location: ../../paginas/usuario_empresas.php');
            echo '<script language="javascript">';
            echo 'alert("Empresa nao pode ser alterada '.$conn->error.'")';
            echo '</script>';
    }

?>