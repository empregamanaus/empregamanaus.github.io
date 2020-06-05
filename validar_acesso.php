<?php

    session_start();

    require_once('php/conexaoBanco/db.class.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT email FROM usuario WHERE email = '$email' AND senha = '$senha'";

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $resultado_id = mysqli_query($link, $sql);

    if($resultado_id){

        $dados_usuario = mysqli_fetch_array($resultado_id);

        if(isset($dados_usuario['email']) and $dados_usuario['email']==$email){

        
            $_SESSION['email'] = $dados_usuario['email'];
            echo '<script language="javascript">';
            echo 'alert("Usuario autenticado com sucesso")';
            echo '</script>';
        

            header('Location: paginas/usuario_empresas.php');


        }else{
            echo '<script language="javascript">';
            echo 'alert("Acho que você inseriu a senha errada.")';
            echo '</script>';
            header('Location: paginas/index.html?erro=1');

        }

    }else{
        
        echo '<script language="javascript">';
        echo 'alert("A consulta no banco não deu certo.")';
        echo '</script>';
        header('Location: paginas/index.html?erro=1');

    }

?>