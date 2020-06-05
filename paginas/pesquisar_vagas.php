<!DOCTYPE html>
<html>
<head>
    <title>Emprega Manaus</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="..\css\stylee.css">
    <link rel="stylesheet" type="text/css" href="..\css\sidebar_candidato.css">
    <link rel="stylesheet" type="text/css" href="..\css\modals.css">
    
</head>
<body>
    <?php
    session_start();
    include_once("../php/conexaoBanco/conexao.php");
    require_once('../php/conexaoBanco/db.class.php');
    ?>
    <h1>Bem vindo </h1>

    
    <div class="page-content">
    <section>
    
    </section>
    </div>
    
    <nav>
      <a href="..\index.html">Home</a>
      <a href="#">About</a>
      <a href="..\paginas\Pag_Equipe.html" target="_blank">Equipe</a>
      <a href="#" >Contatos</a>

      <div class="dropdown">
        <a href="javascript:void(0)" class="dropbtn">Cadastrar</a>
        <div style="background-color: #e67e22; " class="dropdown-content">
          <a href=".\paginas\fomulario_Usuario.html" target="_blank">Usuario</a>
        </div>
      </div>

      <div class="dropdown">
        <a href="pesquisar_vagas.php" class="dropbtn"  target="_blank">Vagas</a>         
      </div>
        
        <a  target="_blank" onclick="document.getElementById('id01').style.display='block'">Entrar</a>
        
      <div class="animation start-home"></div>
    </nav>
    
    <section class="vagas-section">
        <div class="breadcrumb"><a href="../index.html">Menu</a> > <a href="pesquisar_vagas.php">Vagas</a></div>
        <span class="title-2 left-side">Pesquisar Vagas</span>
        <div class="row"></div>
           
           <form method="POST" action="">
      <input type="text" name="nome" placeholder="Digite o nome ou apenas clique em pesquisar para mostrar todas"><br><br>
      
      <input name="SendPesqUser" type="submit" value="Pesquisar">
    </form><br><br>
    
    <?php
    $SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
    if($SendPesqUser){
      $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
      $result_vagas = "SELECT * FROM vaga WHERE nomeAnuncio LIKE '%$nome%'";
      $resultado_vagas = mysqli_query($conn, $result_vagas);
      while($row_vagas = mysqli_fetch_assoc($resultado_vagas)){
        //echo "nome: <br>";
        //echo "tipo: <br>";
        //echo "NumeroVagas: <br>";
        //echo "bairro: <br>";
       
        //echo "<a href='apagar_vagas.php?id=" . $row_vagas['id'] . "'>Apagar</a><br><hr>";
        //----------
          
                  echo "<div class='vagas'>";
                  echo "<div class='row'>";
                  echo "<div class='col u3'><h2 class='vagas-title'>Nome</h2><span class='description'>". $row_vagas['nomeAnuncio']."</span></div>";
                  echo "<div class='col u3'><h2>Oferta</h2><span class='description'>". $row_vagas['tipoOferta']."</span></div>";
                  echo "<div class='col u3'><h2>Bairro</h2><span class='description'>". $row_vagas['bairro']."</span></div>";
                  echo "</div>";
                  echo "<div class='row'>";
                  echo "<div class='col u1'>";      
                  echo "<h2>Descricao</h2><span class='description' style='word-wrap: break-word'>". $row_vagas['descricao']."</span>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
        
      }
    }
    ?>
    </section>


    <!--Login Empregador (usuário agora por causa do adriano)-->
    <div id="id01" class="modal">

        <form class="modal-content animate" method="post" action="../validar_acesso.php">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

                <img src="../imgs/profile.png" alt="Avatar" class="avatar">

            </div>
            <span class="psw"><a href="formulario_Usuario.html" target="_blank" style="color: aliceblue">Criar conta</a></span>
            <div class="modal-container">
                <label for="uname"><b>Email</b></label>
                <input class="modal-input" type="text" placeholder="Digite seu email" name="email" required>

                <label for="psw"><b>Senha</b></label>
                <input class="modal-input" type="password" placeholder="Digite sua senha" name="senha" required>

                <button type="submit">Login</button>
            </div>

            <div class="modal-container">
                <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                <span class="psw">Esqueceu a <a href="#">senha?</a></span>

            </div>
        </form>
    </div>    
        
    
    <script src="https://kit.fontawesome.com/a9aa97efbd.js" crossorigin="anonymous"></script>
    <script>
        
        function openNav() {
          document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
          document.getElementById("mySidenav").style.width = "0";
        }
        
        //dropdown
        
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
          dropdown[i].addEventListener("click", function() {
          this.classList.toggle("active");
          var dropdownContent = this.nextElementSibling;
          if (dropdownContent.style.display === "block") {
          dropdownContent.style.display = "none";
          } else {
          dropdownContent.style.display = "block";
          }
          });
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