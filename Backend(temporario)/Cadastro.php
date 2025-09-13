<?php
use Usuario.php;

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
$stmt->bind_param("sss", $usuario->getNome, $usuario->getEmail, $usuario->getSenha);

$usuario = new Usuario();
// set parameters and execute
$usuario->setNome($_POST['nome']);
$usuario->setEmail($_POST['email']);
$usuario->setSenha($_POST['password'])

$stmt->execute();

echo "New records created successfully";

$stmt->close();
$conn->close();
?>


