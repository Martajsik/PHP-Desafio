<?php

include('includes/header.php');
include('./functions/functions.php');

if ($_POST) {
  $usuario = login($_POST['emailUsuario'],$_POST['senhaUsuario']);

  if ($usuario) {
    session_start();

    $_SESSION['usuario'] = $usuario;

    header('Location: indexProducts.php');
  };

};

?>

<main class="container d-flex justify-content-center flex-column">
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
    form{
      color: white;
    }
  </style>
  <h1>Entrar</h1>

  <form action="" method="POST" id="form1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <script defer src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
 <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <div class="form-group">
    <label for="">E-mail:</label>
    <input type="email" class="form-control" name="emailUsuario" id="emailUsuario" aria-describedby="emailHelpId" placeholder="">
  </div>

  <div class="form-group">
    <label for="">Senha:</label>
    <input type="password" class="form-control" name="senhaUsuario" id="senhaUsuario" placeholder="">
  </div>

  <button class="btn btn-primary" type="submit" value="">Entrar</button>

  <div>
  <?php

  if($_POST) {
    if (!$usuario) {
      echo "<div class='alert alert-danger mt-3'>Usuário ou senha incorretos</div>"; };
    };
  ?>
  </div>

  </form>

</main>
