<?php
    require_once('../conexaoBanco/db.class.php');
    require_once('../conexaoBanco/conexao.php');
    session_start();
    $email = $_SESSION['email'];

if($email){
    session_destroy();
    echo "<script> 
    alert('Você deixou a sessão'); 
    window.location.href='../../index.html';
    </script>";
}else{	
    echo "<script> 
    alert('Parece que você não está em uma sessão válida'); 
    window.location.href='../../index.html';
    </script>";
}
?>