<?php
require_once "Usuario.php";
require_once "UsuarioDAO.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['password'];

$usuario = new Usuario(null, $nome, $email, $senha);

$conexaoUsuario = new UsuarioDAO();

$conexaoUsuario->criar($usuario);
?>
