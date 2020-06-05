<!DOCTYPE html>
<html>
<head>
<title>Emprega Manaus</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="..\css\stylee.css">
    <link rel="stylesheet" type="text/css" href="..\css\sidebar_candidato.css">
</head>
<body>
    
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
          <a href=".\fomulario_Empregador.html" target="_blank">Empresas</a>
        </div>
      </div>

      <div class="dropdown">
        <a href="pesquisar_vagas.php" class="dropbtn"  target="_blank">Vagas</a>       
      </div>
        <div class="dropdown">
            <a  target="_blank" class="dropbtn" onclick="document.getElementById('id01').style.display='block'">Usuario</a>
            <div style="background-color: #e67e22; " class="dropdown-content">
              <a href="usuario_empresas.php" target="_blank">Empresas</a>
              <a href="fomulario_alterar_usuario.php" target="_blank">Conta</a>
              <a href="..\php\usuario\terminar_sessao.php" target="_blank">Sair</a> <!--PHP para terminar a sessão-->
            </div>
        </div>
        
      <div class="animation start-home"></div>
    </nav>
    
    <section class="vagas-section">
        <div class="breadcrumb"><a href="../index.html">Menu</a> > <a href="usuario_empresas.php">Empresas</a></div>
        <span class="title-2 left-side">Suas Empresas</span>
        
        <a href="formulario_Empregador.html"><button  class="right-side default-btn">Cadastrar empresa</button></a><br>
        <span>Clique na empresa desejada para visitar sua página</span>
        <?php
            include_once("../php/conexaoBanco/db.class.php");
            
            include_once("../php/conexaoBanco/conexao.php");
            session_start();
            if (!isset($_SESSION['email'])){
                $_SESSION['msg'] = "<p style='color:red;'>Você tem que estar logado para realizar isso</p>";
		          header("Location: ../index.html");
            }
            
        
              $email = $_SESSION['email'];
              $result_empresas = "SELECT * FROM empresa WHERE emailUsuario = '$email'";
              $resultado_empresa = mysqli_query($conn, $result_empresas);
              if($resultado_empresa){
                  
                  while($row_empresas = mysqli_fetch_assoc($resultado_empresa)){
                      echo "<a class='link-vagas' href='empresa.php?id=".$row_empresas['idEmpresa']."&nome=".$row_empresas['nomeEmpresa']."'>";
                      echo "<div class='vagas' id='myBtn' href='empresa.php?id=".$row_empresas['idEmpresa']."?nome=".$row_empresas['nomeEmpresa']."'>";
                      echo "<div class='row'>";
                      echo "<div class='col u2'><h2 class='vagas-title'>Nome</h2><span class='description'>". $row_empresas['nomeEmpresa']."</span></div>";
                      echo "</div>";
                      echo "<div class='row'>";
                      echo "<div class='col u1'>";      
                      echo "<h2>Descricao</h2><span class='description'>". $row_empresas['ramoAtividade']."</span>";      
                      echo "</div>";
                      echo "</div>";
                      echo "</div>";
                      echo "</a>";

                  }
              }
    
        
        ?>
        <!--
        <div class="vagas" id="myBtn">
            <div class="row">
                <div class="col u2"><h2 class="vagas-title">Nome</h2><span class="description">default</span></div>
            </div>
            
            <div class="row">
                <div class="col u1">
                    <h2>Descricao</h2><span class="description">default</span>
                </div>
            </div>
        </div>
        -->
        
        
    </section>
    
  <!-- Modal content 
        <div id="myModal" class="modal">

          <div class="modal-content">
            <div class="modal-header">
              <span class="close">&times;</span>
              <h2>Modal Header</h2>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col u3"><h2>Oferta</h2><span class="description">default</span></div>
                <div  class="col u3"><h2>Bairro</h2><span class="description">default</span></div>
              </div>
            
            <div class="row">
                <div class="col u1">
                    <h2>Descricao</h2><span class="description">default</span>
                </div>
            </div>
            <div class="row">
                <div class="col u1">
                    <h2>Contato:</h2><span class="description">default</span>
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <button class="right-side default-btn">Excluir Vaga</button>
                    <button class="right-side default-btn">Editar Vaga</button>
                </div>
            </div>
          </div>

        </div>
    -->
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
        
        //Modal
        /*
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
          modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
            */
        }
</script>
</body>
</html>