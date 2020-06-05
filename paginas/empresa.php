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
    
    <?php

        require_once('../php/conexaoBanco/db.class.php');
        include_once("../php/conexaoBanco/conexao.php");
        
        session_start();
        if (!isset($_SESSION['email'])){
            $_SESSION['msg'] = "<p style='color:red;'>Você tem que estar logado para realizar isso</p>";
    header("Location: ../index.html");
        }
    
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $nome = $_GET['nome'];
        
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
          <a href="<?php echo "formulario_vagas.php?id=$id&nome=$nome";?>" target="_blank">Vaga</a>
          
        </div>
      </div>

      <div class="dropdown">
        <a href="pesquisar_vagas.html" class="dropbtn"  target="_blank">Vagas</a>       
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
        <div class="breadcrumb"><a href="../index.html">Menu</a> > <a href="usuario_empresas.php">Empresas</a> > <a href="empresa.php?id=<?php echo $id; ?>&nome=<?php echo $nome; ?>">Empresa <?php echo $nome;?></a></div>
        <span class="title-2 left-side">Vagas da Empresa <?php echo $nome; ?></span>
        
        <a href="<?php echo "formulario_alterar_empresa.php?id=$id";?>"><button class="right-side default-btn">Alterar/Excluir Empresa</button></a>
        <a href="<?php echo "formulario_vagas.php?id=$id&nome=$nome";?>"><button class="right-side default-btn">Criar Vaga</button></a>
        
        <?php
        $objDb = new db();
        $link = $objDb->conecta_mysql();

        if($id){
          $result_vagas = "SELECT * FROM vaga WHERE idEmpresa = '$id'";
          $resultado_vagas = mysqli_query($conn, $result_vagas);
          if($resultado_vagas){
              
          while($row_vagas = mysqli_fetch_assoc($resultado_vagas)){

            //echo "<a href='apagar_vagas.php?id=" . $row_vagas['idEmpresa'] . "'>Apagar</a><br><hr>";
          //--------
                  $codigo = $row_vagas['codigo'];
                  echo "<div class='vagas' id='myBtn'>";
                  echo "<div class='row'>";
                  echo "<div class='col u3'><h2 class='vagas-title'>Nome</h2><span class='description'>". $row_vagas['nomeAnuncio']."</span></div>";
                  echo "<div class='col u3'><h2>Oferta</h2><span class='description'>". $row_vagas['tipoOferta']."</span></div>";
                  echo "<div class='col u3'><h2>Bairro</h2><span class='description'>". $row_vagas['bairro']."</span></div>";
                  echo "</div>";
                  echo "<div class='row'>";
                  echo "<div class='col u1'>";      
                  echo "<h2>Descricao</h2><span class='description' style='word-wrap: break-word'>". $row_vagas['descricao']."</span>";
                  echo "</div>";
                  echo "<hr><a class='right-side' href='formulario_editar_vaga.php?id=$id&codigo=$codigo&nome=$nome' target='_blank'>Alterar/Apagar</a><br><hr>"; //falta criar essa página :/
                  echo "</div>";
                  echo "</div>";
                      
              }
          }
        }
        ?>
        <!--
        <div class="vagas" id="myBtn">
            <div class="row">
                <div class="col u3"><h2 class="vagas-title">Nome</h2><span class="description">default</span></div>
                <div class="col u3"><h2>Oferta</h2><span class="description">default</span></div>
                <div  class="col u3"><h2>Bairro</h2><span class="description">default</span></div>
            </div>
            
            <div class="row">
                <div class="col u1">
                    <h2>Descricao</h2><span class="description">default</span>
                </div>
            </div>
        </div>
        -->
        
        
    </section>
    
  <!-- Modal content tirei pq ia dar trabalho
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
        }
        */
</script>
</body>
</html>