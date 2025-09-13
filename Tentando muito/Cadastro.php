<?php
require_once "Usuario.php";
require_once "UsuarioDAO.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['password'];

$conexaoUsuario = new UsuarioDAO();

$usuario = ($nome,$email,$senha);

$conexaoUsuario->salvar($usuario);
?>