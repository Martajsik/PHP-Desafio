<?php
include('functions.php');

$id = $_GET['id'];

$show = editarProduto($id,'../bd/produtos.json');

header("Location: ../showProduct.php?id=$id"); 

?>