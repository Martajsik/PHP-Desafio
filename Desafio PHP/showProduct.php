<?php
include('./includes/header_adm.php');
include('./functions/functions.php');

$oProduto = selecionaUmItem($_GET['id'],'./bd/produtos.json');
?>

<main class="container d-flex justify-content-center flex-column">
  <style media="screen">
    img{
      border-radius: 10px;
      width: 300px;
    }
  </style>
  <h1>Informações do produto</h1>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script defer src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
<script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

  <table class="table">
    <tbody>
      <tr>
        <th scope="col">Nome do produto:</th>
        <th scope="col"><?= $oProduto['nomeProduto'] ?></th>
      </tr>
      <tr>
        <th scope="col">Preço do produto:</th>
        <th scope="col">R$ <?= $oProduto['precoProduto'] ?></th>
      </tr>
      <tr>
        <th scope="col">Descrição do produto:</th>
        <th scope="col"><?= $oProduto['descricaoProduto'] ?></th>
      </tr>
    </tbody>
  </table>

  <img class="rounded" src="<?= $oProduto['fotoProduto'] ?>"><br>

  <a href="editProduct.php?id=<?= $_GET['id'] ?>" class="btn btn-warning mt-3" id="editar">Editar</a>
</main>
