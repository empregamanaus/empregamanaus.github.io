<!DOCTYPE html>
<html>
<head>
<title>Cadastro de Usuario</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"  href="..\css\formularioPessoa.css">
<link rel="stylesheet" type="text/css" href="..\css\modals.css">
</head>
<body>
    <?php
    
        require_once('../php/conexaoBanco/db.class.php');
        require_once('../php/conexaoBanco/conexao.php');
        session_start();

        $email = $_SESSION['email'];

        if($conn->connect_error){
        echo 'Connection Faild: '.$conn->connect_error;
        }else{
            $sql="select * from usuario where email = '$email'";

            $res=$conn->query($sql);

            while($row=$res->fetch_assoc()){

                $nome = $row['nome'];
                $email = $row['email'];
                $senha = $row['senha'];
                }       

            }
    ?>
    
    <div class="container">
      <h3>Alterar Usuário</h3>
      <p>Preencha com as alterações que deseja fazer</p>
      
      <form name"frmUsuario" method="post" action="../php/usuario/altera_usuario.php" onSubmit="return validaForm(this);">
        <label for="fname">nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" placeholder="Nome completo...">

        <label for="email">E-mail:</label>
        <input type="text" id="email" value="<?php echo $email; ?>" name="email" placeholder="Seu E-mail..." disabled>
        
        <label for="senha"> Senha antiga</label>
        <input type="text" name="antigasenha"/>     
          
        <label for="senha">Nova Senha</label>
        <input type="text" name="senha"/>    

        <label for="senha2">Repita sua senha</label>
        <input type="text" name="senha2"/>
       
      
        <input type="submit" value="Salvar">
        <input type="button" name="btn-sair" value="Sair" onclick="javascript:window.close()">
          <input type="button" class="btn-excluir" value="Excluir minha conta" onclick="document.getElementById('id01').style.display='block'"> <!--Colocar um modal só pro cara poder desfazer as cagadas da vida dele-->
      </form>
    </div>
    
    <!---->
    <div id="id01" class="modal">
  
          <form class="modal-content animate" action="../php/usuario/apagar_usuario.php" method="post">
              <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <h2 style="color: aliceblue">Tem certeza que quer excluir sua conta? essa ação não pode ser desfeita</h2>
              <div class="modal-container">

              <a href="../php/usuario/apagar_usuario.php"><button type="submit" style="background-color: tomato">Excluir minha conta</button></a>
            </div>

            <div class="modal-container" style="background-color:#f1f1f1">
              <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
              <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
          </form>
    </div>
    
    
    
    <script type="text/javascript">
            function validaForm(frm) {
                var nome = document.getElementById("nome");
                var email = document.getElementById("email");
                var senha_antiga = "<?php echo $senha; ?>";
                
                if(nome.value == "" || frm.nome.value == null || frm.nome.value.lenght < 3) {
                    alert("Por favor, indique o seu nome.");
                    nome.focus();
                    return false;
                }
                
                if(frm.senha.value != frm.senha2.value) {
                    alert("As senhas tem que ser iguais.");
                    frm.senha.focus();
                    return false;
                }
                if(senha_antiga != frm.antigasenha.value) {
                    alert("A senha antiga tem que estar correta.");
                    frm.antigasenha.focus();
                    return false;
                }
                return true;
            }

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