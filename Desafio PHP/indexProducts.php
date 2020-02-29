<?php
include('./includes/header_adm.php');

include('./functions/functions.php');

$arrayListaProdutos = JSONParaArray('./bd/produtos.json');
?>

<main class="container">
  <link rel="stylesheet" href="css/css.css">
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
  <style media="screen">
    a:hover{
      color: #34495e;
    }
    #info{
      color: #b2bec3;
    }
    table{
      background-color: #222f3e;
      text-align: center;
      padding: 10px;
      border-radius: 10px;
      color: white;
    }
    th{
      padding: 10px;
    }
    #add{
      background-color: #222f3e;
      padding: 10px;
      border-bottom-left-radius: 10px;
      border-bottom-right-radius: 10px;
      color:#b2bec3;
    }
    .body1{
      position: absolute;
      left: 27%;
    }
  </style>

  <div class="body1">
<link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <script defer src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
 <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<style media="screen">
  body{
    font-family: 'Ubuntu', ;
  }
</style>
  <h1>Lista de produtos</h1>
  <table class="table">
    <thead>
      <tr>
        <th>
        Nome do produto
        </th>
        <th>
        Descrição do produto
        </th>
        <th>
        Preço do produto
        </th>


        <th></th>
      </tr>

    </thead>
    <tbody>
    <?php foreach ($arrayListaProdutos as $produto) :?>
      <tr>
        <th><?php echo $produto['nomeProduto'] ?></th>
        <th><?php echo $produto['descricaoProduto'] ?></th>
        <th>R$ <?php echo $produto['precoProduto'] ?></th>
        <th><a href="showProduct.php?id=<?= $produto['id'] ?>" class="btn btn-primary" id="info">Mais informações</a>
      </tr>
    <?php endforeach ?>
    </tbody>
  </table>

  <a href="createProduct.php?" class="btn btn-primary" id="add">Adicionar</a>
  </div>
<div>
</div>
</main>
