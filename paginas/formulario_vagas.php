<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="..\css\formularioVagas.css">
</head>
<body>
    <?php   
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $nome = $_GET['nome'];
    ?>
<div class="container">
  <!--<form action="/action_page.php">-->
    <h3>Cadastrar Vaga</h3>
    <p>Dados da Oferta</p>

  <form method="post" action="<?php echo "../php/vaga/registrar_vagas.php?id=$id&nome=$nome" ?>">   
      
       <label for="fAnuncio">Nome do Anúncio:</label>
       <input type="text" id="fanuncio" name="anuncio" placeholder="Nome do Anuncio...">   
       <label for="lname">Tipo de Oferta:</label>      
         <select id="oferta" name="oferta">
            <option value="estagio">Estágio</option>
            <option value="treinee">Treinee</option>
            <option value="emprego">Emprego</option>
          </select>    
        <label for="bairro">Bairro</label>      
        <select id="bairro" name="bairro">
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
        <textarea id="descricao" name="descricao" placeholder="Descrição da vaga..." style="height:200px"></textarea>
        <label for="email">Email de contato</label>      
        <input type="text" id="email" name="emailcontato" placeholder="email para o candidato fazer contato.">   
   
    <div class="row">
      <input type="submit" value="Enviar">
    </div>
    <input type="button" name="btn-sair" value="Sair" onclick="javascript:window.close()">
  </form>
</div>

</body>
</html>