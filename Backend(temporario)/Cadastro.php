<?php
require_once "Usuario.php";

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "LORY";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
$stmt = $conn->prepare("INSERT INTO Usuario (nomeUsuario, emailUsuario, senhaUsuario) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $usuario->nome,  $usuario->email,  $usuario->senha);

// set parameters and execute
$usuario = new Usuario($_POST['nome'], $_POST['email'], $_POST['password'])

$stmt->execute();

echo "New records created successfully";

$stmt->close();
$conn->close();
?>
