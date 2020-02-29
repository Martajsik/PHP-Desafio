<?php
session_start();

$usuario = [];

$_SESSION['usuario'] = $usuario;

header('Location: ../index.php');
?>