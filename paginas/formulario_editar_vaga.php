<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="..\css\formularioVagas.css">
    <link rel="stylesheet" type="text/css" href="..\css\modals.css">
</head>
<body>
    <?php
        require_once('../php/conexaoBanco/db.class.php');
        include_once("../php/conexaoBanco/conexao.php");
        session_start();
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $codigo = filter_input(INPUT_GET, 'codigo', FILTER_SANITIZE_NUMBER_INT);
        $nomeEmpresa = $_GET['nome'];
        
        $email = $_SESSION['email'];
        
        if (!isset($_SESSION['email'])){
                $_SESSION['msg'] = "<p style='color:red;'>Você tem que estar logado para realizar isso</p>";
		header("Location: ../index.html");
        
        /*
          $result_vagas = "SELECT * FROM empresa WHERE idEmpresa = '$id'";
          $resultado_vagas = mysqli_query($conn, $result_vagas);*/ }
        
        if($conn->connect_error){
        echo 'Connection Faild: '.$conn->connect_error;
        }else{
            $sql="select * from vaga where codigo = '$codigo'";

            $res=$conn->query($sql);

            while($row=$res->fetch_assoc()){
                
                
                $nome = $row['nomeAnuncio'];
                $tipo = $row['tipoOferta'];
                $bairro = $row['bairro'];
                $descricao = $row['descricao'];
                $emailcontato = $row['emailContato'];
                }       

            }
         
    ?>
<div class="container">
  <!--<form action="/action_page.php">-->
    <h3>Cadastrar Vaga</h3>
    <p>Dados da Oferta</p>

  <form method="post" action="<?php echo "../php/vaga/altera_vaga.php?id=$id&codigo=$codigo&nome=$nomeEmpresa" ?>">   
      
       <label for="fAnuncio">Nome do Anúncio:</label>
       <input type="text" id="fanuncio" name="anuncio" value="<?php echo $nome; ?>" placeholder="Nome do Anuncio...">   
       <label for="lname">Tipo de Oferta:</label>      
         <select id="oferta" name="oferta">
            <option value="estagio">Estágio</option>
            <option value="treinee">Treinee</option>
            <option value="emprego">Emprego</option>
          </select>    
        <label for="bairro">Bairro</label>      
        <select id="bairro"  name="bairro">
          <option value="Coroado">Bairro</option>
          <option value="Coroado">Coroado</option>
          <option value="Alvorada">Alvorada</option>
          <option value="viverMelhor">Viver Melhor</option>
          <option value="efigenioSales">Efigenio Sales</option>
          <option value="condJP">Joao Paulo</option>
          <option value="jorgeTeixeira">Jorge Teixeira</option>
          <option value="novaCidade">Nova Cidade</option>
        </select>     
        <label for="descricao">Descrição</label>      
        <textarea id="descricao" name="descricao" placeholder="Descrição da vaga..." style="height:200px"><?php echo $descricao; ?></textarea>
        <label for="email">Email de contato</label>      
        <input type="text" id="email" value="<?php echo $emailcontato; ?>" name="emailcontato" placeholder="email para o candidato fazer contato.">   
   
    <div class="row">
      <input type="submit" value="Enviar">
    </div>
    <input type="button" name="btn-sair" value="Sair" onclick="javascript:window.close()">
    <input type="button" class="btn-excluir" value="Excluir minha vaga" onclick="document.getElementById('id01').style.display='block'">
  </form>
</div>
    
    <div id="id01" class="modal">
  
          <form class="modal-content animate" action="<?php  echo "../php/vaga/apagar_vagas.php?id=$id&codigo=$codigo&nome=$nomeEmpresa"; ?>" method="post">
              <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <h2 style="color: aliceblue">Tem certeza que quer excluir sua vaga? essa ação não pode ser desfeita</h2>
              <div class="modal-container">


              <a href="<?php  echo "../php/vaga/apagar_vagas.php?id=$id&codigo=$codigo&nome=$nomeEmpresa"; ?>"><button type="submit" style="background-color: tomato">Excluir minha vaga</button></a>
            </div>

            <div class="modal-container" style="background-color:#f1f1f1">
              <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
              <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
          </form>
    </div>
    
    <script type="text/javascript">
                
                //Modal ----
            var modal = document.getElementById('id01');

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }

        </script>
</body>
</html>