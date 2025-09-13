<?php
session_start();
require_once __DIR__ . '/../config/config.php';

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome  = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nome, $email, $senha);

    if ($stmt->execute()) {
        $msg = "Cadastro realizado com sucesso! <a href='login.php'>Entrar</a>";
    } else {
        $msg = "Erro ao cadastrar: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>

<html lang="en">
    
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Lory</title>
    <link rel="icon" type="image/png" href="icon.png">
    
</head>

<body>

    <div style="display: block; text-align: center;">
    <form action="questionario.php" method="post">
  
    <table>

        <tr>
            <td colspan="2"><h1 style="padding-top: 13%;font-size: 300%;padding-bottom: 1;">Cadastro</h1></td>
        </tr>

        <tr> 
            <td><input type="text" name="nome" placeholder="Nome" id="nome" onfocus="resetarLogin(this)"></td>
        </tr>
            
        <tr>
            <td><input type="email" name="email" placeholder="Email" id="email"onfocus="resetarLogin(this)"></td>
        </tr>

        <tr>
            <td><input type="password" name="password" placeholder="Senha"  id="senha"  onfocus="mudarParaPassword(this)"></td>
        </tr>

        <tr>
            <td><input type="password" name="passwordConfirm" placeholder="Confirmar Senha"    onfocus="mudarParaPassword(this)" id="confirmarSenha"></td>
        </tr>
        
        <tr>
            <td><a href="questionario.html"><input type="submit" style="padding: 15px 30px; font-size: 15px; margin: 60px;" value="Entrar" ></a></td>
        </tr>
            
    </table>
        
    </form>

    <p><a href="login.html" style="color: aliceblue;">Já tem uma conta? Entre aqui.</a></p>
    
    </div>
    
</body>

</html>

