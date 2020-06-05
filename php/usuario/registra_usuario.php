<?php

    require_once('../conexaoBanco/db.class.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $sql = "INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

    //executar a query
    if(mysqli_query($link, $sql)){
        echo '<script language="javascript">';
        echo 'alert("Usuario registrado com sucesso")';
        echo '</script>';
        
		header("Location: ../../index.html");
    }else{
        echo '<script language="javascript">';
        echo 'alert("Hmm? Algo deu errado durante o registro do usuário.")';
        echo '</script>';
        
		header("Location: ../../index.html");
    }

?>