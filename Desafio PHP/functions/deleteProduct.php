<?php

include('functions.php');

excluirItem($_GET['id'],'../bd/produtos.json');

header('Location: ../indexProducts.php');

?>