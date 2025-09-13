 <?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
$stmt = $conn->prepare("SELECT * FROM Usuario WHERE emailUsuario = ? AND senhaUsuario = ?");
$stmt->bind_param("ss", $email, $senha);

if ($result->num_rows > 0) {
    header('location: cadastro.html'); 
    die(); 
} else {
  echo "0 results";
}
$conn->close();
?> 