<?php
include '../database/db_connect.php';

$message = "";
$toastClass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email already exists
    $checkEmailStmt = $conn->prepare("SELECT email FROM userdata WHERE email = ?");
    $checkEmailStmt->bind_param("s", $email);
    $checkEmailStmt->execute();
    $checkEmailStmt->store_result();

    if ($checkEmailStmt->num_rows > 0) {
        $message = "Email ID already exists";
        $toastClass = "#007bff"; // Primary color
    } else {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO userdata (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);

        if ($stmt->execute()) {
            $message = "Account created successfully";
            $toastClass = "#28a745"; // Success color
        } else {
            $message = "Error: " . $stmt->error;
            $toastClass = "#dc3545"; // Danger color
        }

        $stmt->close();
    }

    $checkEmailStmt->close();
    $conn->close();
}


<!DOCTYPE html>

<html lang="en">
    
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Lory</title>
    
</head>

<body>

    <div style="display: block; text-align: center;">
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
  
    <table>

        <tr>
            <td colspan="2"><h1 style="padding-top: 13%;font-size: 400%;padding-bottom: 1;">Cadastro</h1></td>
        </tr>

        <tr> 
            <td><input type="text" name="nome" placeholder="Nome" id="nome" onfocus="resetarLogin(this)"></td>
            <span class="error">* <?php echo $nomeErro;?></span>
            <br><br>
        </tr>
            
        <tr>
            <td><input type="email" name="email" placeholder="Email" id="email"onfocus="resetarLogin(this)"></td>
            <span class="error">* <?php echo $memailErro;?></span>
            <br><br>
        </tr>

        <tr>
            <td><input type="password" name="password" placeholder="Senha"  id="senha"  onfocus="mudarParaPassword(this)"></td>
            <span class="error">* <?php echo $senhaErro;?></span>
            <br><br>
        </tr>

        <tr>
            <td><input type="password" name="passwordConfirm" placeholder="Confirmar Senha"    onfocus="mudarParaPassword(this)" id="confirmarSenha"></td>
            <span class="error">* <?php echo $senhaConfirmaErro;?></span>
            <br><br>
        </tr>
        <tr>
            <td><input type="submit" style="padding: 15px 30px; font-size: 15px; margin: 60px;" value="Entrar" ></td>
        </tr>
            
    </table>
        
    </form>
    
    </div>
    
</body>

</html>





