<?php

////////// FUNÇÕES DE MANIPULAÇÃO DE ARRAY E JSON //////////

// Resgata o arquivo JSON e o tranforma em um array
function JSONParaArray($caminho) {
  $json = file_get_contents($caminho);
  $array = json_decode($json, true);
  if (is_null($array)) {
    $array = [];
  };
  return $array;
};

// Transforma o array em JSON e salva a alteração
function arrayParaJSON($array,$caminho) {
  $json = json_encode($array);
  return $status = file_put_contents($caminho,$json);
};

// Seleciona o item pelo seu ID
function selecionaUmItem($id,$caminho) {
  $array = JSONParaArray($caminho);
  foreach ($array as $item) {
    if ($item['id'] == $id) {
      $itemSelecionado = $item;
      return $itemSelecionado;
    };
  };
};

// Exclui um item pelo seu ID
function excluirItem($id,$caminho) {
  $array = JSONParaArray($caminho);
  $indiceDoItem = indiceDoItemNoArray($id,$caminho);
  $itemExcluido = array_splice($array, $indiceDoItem, 1);
  return $status = arrayParaJSON($array,$caminho);
};

// Retorna o indice de um item no array com base em seu ID
function indiceDoItemNoArray($id,$caminho) {
  $array = JSONParaArray($caminho);
  $contador = 0;
  foreach ($array as $item) {
    if ($item['id'] == $id) {
      $indiceDoItem = $contador;
    } else {
      $contador++;
    };
  };
  return $indiceDoItem;
};

////////// FUNÇÕES DE PRODUTOS //////////

// Adiciona um produto ao array
function adicionaProdutoAoArray($arrayProdutos) {

  if ($_FILES['fotoProduto']['error'] === 0) {
    $nome_foto = $_FILES['fotoProduto']['name'];
    $nome_temp = $_FILES['fotoProduto']['tmp_name'];
    $url_imagem = './img/' . $nome_foto;
    move_uploaded_file($nome_temp, './' . $url_imagem);
  } 
  
  if (sizeof($arrayProdutos) == 0) {
    $novoProduto = [
      'id' => 1,
      'nomeProduto' => $_POST['nomeProduto'],
      'descricaoProduto' => $_POST['descricaoProduto'],
      'precoProduto' => $_POST['precoProduto'],
      'fotoProduto' => $url_imagem
    ];
  } else {
    $novoProduto = [
      'id' => end($arrayProdutos)['id'] + 1,
      'nomeProduto' => $_POST['nomeProduto'],
      'descricaoProduto' => $_POST['descricaoProduto'],
      'precoProduto' => $_POST['precoProduto'],
      'fotoProduto' => $url_imagem
    ];
  };
  array_push($arrayProdutos,$novoProduto); 
  return $arrayProdutos; 
};

// Adiciona um Produto ao JSON
function adicionarProduto($caminho) {
  $array = JSONParaArray($caminho);
  $arrayComNovoProduto = adicionaProdutoAoArray($array);
  $status = arrayParaJSON($arrayComNovoProduto,$caminho);
  return $status;
};

// Edita o produto com base em seu ID
function editarProduto($id,$caminho) {
  $arrayProdutos = JSONParaArray('../bd/produtos.json');
  $indiceDoProduto = indiceDoItemNoArray($id,$caminho);

  define('URL_IMAGEM',$arrayProdutos[$indiceDoProduto]['fotoProduto']);

  $arrayProdutos[$indiceDoProduto]['id'] = $id;
  $arrayProdutos[$indiceDoProduto]['nomeProduto'] = $_POST['nomeProduto'];
  $arrayProdutos[$indiceDoProduto]['descricaoProduto'] = $_POST['descricaoProduto'];
  $arrayProdutos[$indiceDoProduto]['precoProduto'] = $_POST['precoProduto'];
  $arrayProdutos[$indiceDoProduto]['fotoProduto'] = URL_IMAGEM;
  
  $status = arrayParaJSON($arrayProdutos,$caminho);
  return $status;
};

////////// FUNÇÕES DE USUÁRIOS //////////

function validacaoDadosUsuario() {
  $status = [];
  if (!$_POST['nomeUsuario']) {
    array_push($status,"É necessário informar o nome do usuário");
  };
  if (!$_POST['emailUsuario']) {
    array_push($status,"É necessário informar o e-mail do usuário");
  };
  if (strlen($_POST['senhaUsuario']) < 6) {
    array_push($status,"A senha precisa conter ao menos 6 caracteres");
  };
  if ($_POST['senhaUsuario'] !== $_POST['confirmacaoSenhaUsuario']) {
    array_push($status,"A senha e a confirmação de senha não estão iguais");
  };
  return $status;
}

function adicionaUsuarioAoArray($arrayUsuarios) {

    if (sizeof($arrayUsuarios) == 0) {
      $novoUsuario = [
        'id' => 1,
        'nomeUsuario' => $_POST['nomeUsuario'],
        'emailUsuario' => $_POST['emailUsuario'],
        'senhaUsuario' => password_hash($_POST['senhaUsuario'],PASSWORD_DEFAULT)
      ];
    } else {
      $novoUsuario = [
        'id' => end($arrayUsuarios)['id'] + 1,
        'nomeUsuario' => $_POST['nomeUsuario'],
        'emailUsuario' => $_POST['emailUsuario'],
        'senhaUsuario' => password_hash($_POST['senhaUsuario'],PASSWORD_DEFAULT)
      ];
    };
    array_push($arrayUsuarios,$novoUsuario);
    return $arrayUsuarios;
};

function adicionarUsuario($caminho) {
  $array = JSONParaArray($caminho);
  $arrayComNovoUsuario = adicionaUsuarioAoArray($array);
  $status = arrayParaJSON($arrayComNovoUsuario,$caminho);
  return $status;
};

function editarUsuario($id,$caminho) {
  $arrayUsuarios = JSONParaArray($caminho);
  $indiceDoUsuario = indiceDoItemNoArray($id,$caminho);
  $arrayUsuarios[$indiceDoUsuario] = [
    'id' => $id,
    'nomeUsuario' => $_POST['nomeUsuario'],
    'emailUsuario' => $_POST['emailUsuario'],
    'senhaUsuario' => password_hash($_POST['senhaUsuario'],PASSWORD_DEFAULT)
  ];
  $status = arrayParaJSON($arrayUsuarios,$caminho);
  return $status;
};

function login($email,$senha) {

  $arrayUsuarios = JSONParaArray('./bd/usuarios.json');
  foreach ($arrayUsuarios as $usuario) {
    if ($email == $usuario['emailUsuario']) {
      if (password_verify($senha,$usuario['senhaUsuario'])) {
        return $usuario;
      };
    };
  };
}