<?php

include('./includes/header_adm.php');
include('./functions/functions.php');

$oProduto = selecionaUmItem($_GET['id'],'./bd/produtos.json');
?>

<main class="container">

<h1>Editar produto</h1>

<form action="./functions/saveEditProduct.php?id=<?= $_GET['id'] ?>" method="POST">
  <style media="screen">
    #form1{
      background-color: #222f3e;
      padding: 10px;
      border-radius: 10px;

    }
    label{
      color: white;
    }
  </style>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script defer src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


  <div class="form-group" id="form1">
    <label for="">Nome do produto:</label>
    <input value="<?= $oProduto['nomeProduto'] ?>" type="text" class="form-control" name="nomeProduto" id="nomeProduto" aria-describedby="helpId" placeholder="">

  </div>

  <div class="form-group" id="form1">
    <label for="">Descrição do produto:</label>
    <textarea class="form-control" name="descricaoProduto" id="descricaoProduto" rows="3"><?= $oProduto['descricaoProduto'] ?></textarea>
  </div>

  <div class="form-group" id="form1">
    <label for="">Preço do produto:</label>
    <input value="<?= $oProduto['precoProduto'] ?>" type="number" class="form-control" name="precoProduto" id="precoDoProduto" aria-describedby="helpId" placeholder="">
  </div>

  <!-- <label for="fotoProduto" class="">Foto: </label>
  <input class="form-control" type="file" name="fotoProduto" id="fotoProduto" /> <br /> -->

  <input type="hidden" name="id" value="<?= $_GET['id'] ?>">

  <button type="submit" class="btn btn-primary">Salvar</button>
  <a name="" id="excluir" class="btn btn-danger" href="./functions/deleteProduct.php?id=<?= $_GET['id'] ?>" role="button">Excluir</a>

</form>

</main>
