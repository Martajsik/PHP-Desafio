<?php
include('./functions/functions.php');
include('./includes/header_adm.php');

$erroNome = false;
$erroPreco = false;
$erroFoto = false;
$adicionado = false;

if ($_POST) {

  // Checa se o nome foi inserido
  (!$_POST['nomeProduto']) ? $erroNome = true : $erroNome = false;
  // Checa se o preço é númerico
  (!$_POST['precoProduto']) ? $erroPreco = true : $erroPreco = false;
  // Checa se a foto foi adicionada
  (!empty($_FILES['fotoProduto']['error'])) ? $erroFoto = true : $erroFoto = false;
  // Adiciona o produto
  if (!$erroNome && !$erroPreco && !$erroFoto) {
  $adicionado = adicionarProduto('./bd/produtos.json');
  };

};

?>

  <main class="container">
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <script defer src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
 <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <style media="screen">
      form{
        color: white;
      }
    </style>
    <style media="screen">
      .table{
        background: #222f3e;
        border-radius: 10px;
        color: white;
      }
      #form1{
        background-color: #222f3e;
        padding: 10px;
        border-radius: 10px;
      }
      th{
        color: white;
      }
      label{
        color: white;
      }
    </style>
  <h1>Adicionar produto</h1>
    <form method="POST" enctype="multipart/form-data" id="form1">
      <div class="form-group">
        <label for="nomeProduto">Nome do produto: </label>
        <input class="form-control" type="text" name="nomeProduto" id="nomeProduto" /> <br />

        <label for="descricaoProduto">Descrição do produto: </label>
        <textarea class="form-control" name="descricaoProduto" id="descricaoProduto" cols="30" rows="10"></textarea><br />

        <label for="precoProduto">Preço: </label>
        <input class="form-control" type="number" name="precoProduto" id="precoProduto" step=0.01 min=0 /> <br />

        <label for="fotoProduto" class="">Foto: </label>
        <input class="form-control" type="file" name="fotoProduto" id="fotoProduto" /> <br />

        <input class="btn btn-primary" type="submit" value="Adicionar" />
      </div>
    </form>

      <?php if(isset($adicionado) && $adicionado) : ?>
      <div class="alert alert-success">Produto adicionado com sucesso!</div>
      <?php endif ?>

      <?php if(isset($erroNome) && $erroNome) : ?>
      <div class="alert alert-danger">É necessário digitar um nome para o produto!</div>
      <?php endif ?>

      <?php if(isset($erroPreco) && $erroPreco) : ?>
      <div class="alert alert-danger">É necessário que o preço seja numérico!</div>
      <?php endif ?>

      <?php if(isset($erroFoto) && $erroFoto) : ?>
      <div class="alert alert-danger">É necessário adicionar uma foto!</div>
      <?php endif ?>

  </main>
</body>
</html>
