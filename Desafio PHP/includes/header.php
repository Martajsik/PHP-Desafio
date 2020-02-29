<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Tomorrow&display=swap" rel="stylesheet">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Desafio PHP Integrado</title>
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
    #navbarNav{
      background: #34495e;
      border-radius: 10px;
      padding: 10px;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">

  <div class="collapse navbar-collapse" id="navbarNav">
    <a class="navbar-brand" href="#">Loja desafio PHP</a>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Entrar<span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="createUsuario.php">Cadastrar</a>
      </li>
    </ul>
  </div>
</nav>
