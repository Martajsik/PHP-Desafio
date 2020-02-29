<?php

include('includes/header_adm.php');
include('./functions/functions.php');

$id = $_GET['id'];
$usuarioSelecionado = selecionaUmItem($id,'./bd/usuarios.json');
$arrayUsuarios = JSONParaArray('./bd/usuarios.json');

if ($_POST) {
  $editado = false;
  $erroValidacao = validacaoDadosUsuario();
  if(sizeof($erroValidacao) == 0) {
    $editado = editarUsuario($id,'./bd/usuarios.json');
    header("Location: showEditUsuario.php?id=$id");
  };
}
?>

<main class="container">
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

  <h1>Usuários</h1>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <script defer src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
 <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <div class="row">
      <div class="col-6">
        <table class="table">
          <thead>
            <tr>
              <th>Nome</th>
              <th>E-mail</th>
              <th>Excluir</th>
              <th>Alterar<th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($arrayUsuarios as $usuario) : ?>
              <tr>
                <th><?= $usuario['nomeUsuario'] ?></th>
                <th><?= $usuario['emailUsuario'] ?></th>
                <th><a href="./functions/deleteUser.php?id=<?= $usuario['id'] ?>" class="btn btn-danger">Excluir</a></th>
                <th><a href="showEditUsuario.php?id=<?= $usuario['id'] ?>" class="btn btn-warning">Editar</a></th>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <div class="col-6">
        <form action="" method="POST" id="form1">
        <div class="form-group">
          <label for="">Nome</label>
          <input value="<?= $usuarioSelecionado['nomeUsuario'] ?>" type="text" class="form-control" name="nomeUsuario" id="nomeUsuario" aria-describedby="helpId" placeholder="">
        </div>

        <div class="form-group">
          <label for="">E-mail</label>
          <input value="<?= $usuarioSelecionado['emailUsuario'] ?>" type="email" class="form-control" name="emailUsuario" id="emailUsuario" aria-describedby="emailHelpId" placeholder="">
        </div>

        <div class="form-group">
          <label for="">Senha</label>
          <input value="" type="password" class="form-control" name="senhaUsuario" id="senhaUsuario" placeholder="">
        </div>

        <div class="form-group">
          <label for="">Confirme a senha</label>
          <input value="" type="password" class="form-control" name="confirmacaoSenhaUsuario" id="confirmacaoSenhaUsuario" placeholder="">
        </div>

        <button value="" type="submit" class="btn btn-primary">Salvar alterações</a>
        </form>
      </div>
    </div>
    <div>
    <?php
        if ($_POST) {
          if ($editado) {
            echo "<div class='alert alert-success mt-2'> Usuário editado com sucesso </div>";
          } else {
            foreach($erroValidacao as $erro) {
              echo "<div class='alert alert-danger mt-2'> $erro </div>";
            };
          };
        }
        ?>
    </div>

</main>
