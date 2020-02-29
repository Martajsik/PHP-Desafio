<?php

include('functions.php');

$id = $_GET['id'];

excluirItem($id,'../bd/usuarios.json');

header('Location: ../showEditUsuario.php?id='.$id);

?>