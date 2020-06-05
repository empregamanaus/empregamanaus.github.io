<!DOCTYPE html>
<html>
    <head>
        <title>Emprega Manaus</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="..\css\formulariocad_Emp.css">
        
        <link rel="stylesheet" type="text/css" href="..\css\modals.css">
    </head>
    <body>
        <?php
    
        require_once('../php/conexaoBanco/db.class.php');
        include_once("../php/conexaoBanco/conexao.php");
        session_start();
        
        $email = $_SESSION['email'];
        
        if (!isset($_SESSION['email'])){
                $_SESSION['msg'] = "<p style='color:red;'>Você tem que estar logado para realizar isso</p>";
		header("Location: ../index.html");
        
        /*
          $result_vagas = "SELECT * FROM empresa WHERE idEmpresa = '$id'";
          $resultado_vagas = mysqli_query($conn, $result_vagas);*/ }
        
        $id = $_GET['id'];
        if($conn->connect_error){
        echo 'Connection Faild: '.$conn->connect_error;
        }else{
            $sql="select * from empresa where idEmpresa = '$id'";

            $res=$conn->query($sql);

            while($row=$res->fetch_assoc()){
                
                $nomeEmpresa = $row['nomeEmpresa'];
                $cnpj = $row['cnpj'];
                $endereco = $row['endereco'];
                $dataAbertura = $row['dataAbertura'];
                $razaoSocial = $row['razaoSocial'];
                $ramoAtividade = $row['ramoAtividade'];
                $situacaoFuncionamento = $row['situacaoFuncionamento'];
                $celular = $row['celular'];
                }       

            }
        ?>
        <div class="container">
          <h3>Alterar Empresa</h3>
            <div>
                 <form name"frmEmpregador" method="post" action="../php/empresa/altera_empresa.php" onSubmit="return validaForm(this);">
                        <label for="nome">Nome Empresa:</label>
                        <input type="text" value="<?php echo $nomeEmpresa;?>" name="nomeEmpresa" id="nome"/>
                     
                        <label for="cnpj">CNPJ:</label>
                        <input type="text" value="<?php echo $cnpj;?>" name="cnpj"/> 
                     
                        <label for="endereco">Endereço:</label>
                        <input type="text" value="<?php echo $endereco;?>" name="endereco"/>  
                     
                        <label for="telefone1">Telefone:</label>
                        <input type="text" value="<?php echo $celular;?>" name="telefone1"/>      
                     
                        <label for="razaosocial">Razão Social:</label>
                        <input type="text" value="<?php echo $razaoSocial;?>" name="razaosocial"/>
                     
                        <label for="dataabertura">Data de abertura</label>
                        <input type="text" value="<?php echo $dataAbertura;?>" name="dataabertura" placeholder="YYYY-MM-DD"/>    
                     
                        <label for="sitfunc">Situação de Funcionamento</label>
                        <input type="text" value="<?php echo $situacaoFuncionamento;?>" name="situacaofuncionamento"/>
                     
                        <label for="ramoatividade">Ramo de atividade</label>
                        <input type="text" value="<?php echo $ramoAtividade;?>" name="ramoatividade"/>
                     
                        <input style="display:none;" type="text" value="<?php echo $id;?>" name="idEmpresa"/>


                    <input type="submit" value="Salvar"/>
                    <input type="button" name="btn-sair" value="Sair" onclick="javascript:window.close()">
                     <input type="button" class="btn-excluir" value="Excluir minha Empresa" onclick="document.getElementById('id01').style.display='block'">
                        
                         <!--
                    <div class="item10">
                        <img src="..\imgs\sua-logo-aqui.png">   

                        ../php/insertLogin.php
                    </div> -->                 
                </form>
            </div>
        </div>
        
        <div id="id01" class="modal">
  
          <form class="modal-content animate" action="<?php  echo "../php/empresa/apagar_empresa.php?id=$id"; ?>" method="post">
              <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <h2 style="color: aliceblue">Tem certeza que quer excluir sua Empresa? essa ação não pode ser desfeita</h2>
              <div class="modal-container">


              <a href="<?php  echo "../php/empresa/apagar_empresa.php?id=$id"; ?>"><button type="submit" style="background-color: tomato">Excluir minha empresa</button></a>
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
                
                if(nome.value == "" || frm.nome.value == null || frm.nome.value.lenght < 3) {
                    alert("Por favor, indique o seu nome.");
                    nome.focus();
                    return false;
                }
                if(email.value.indexOf("@") == -1 ||
                  email.valueOf.indexOf(".") == -1 ||
                  email.value == "" ||
                  email.value == null) {
                    alert("Por favor, indique um e-mail válido.");
                    email.focus();
                    return false;
                }
                return true;
                
                //Modal ----
            var modal = document.getElementById('id01');

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
            }

        </script>
    </body>
</html>