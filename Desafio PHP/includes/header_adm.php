<?php
  require './functions/validalogin.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge"><title>Loja Desafio PHP</title>
</head>
<style media="screen">
#navbarNav{
  text-align: center;
  color: white;
  text-decoration: none;
}
a{
  text-decoration: none;
  color: white;
  font-size: 20px;
}
nav{
  background-color: #222f3e;
  border-radius: 10px;
  font-family: 'Tomorrow', ;
  padding: 10px;
}
.nav-item{
  display: inline;
  padding: 10px;
}
.navbar-brand{
  font-size: 30px;
}
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
  <a class="navbar-brand" href="#">Loja Desafio PHP</a>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="indexProducts.php">Lista de produtos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="createProduct.php">Adicionar produto</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="showEditUsuario.php?id=1">Lista de usuários</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="createUsuario.php">Cadastrar usuário</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./functions/logout.php">Sair</a>
      </li>
    </ul>
  </div>
</nav>
