<?php
    require_once "CONFIG/config.php"
    
    $nome = $email = $senha = $senhaConfirma = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
         if (empty($_POST["name"])) {
             $nameErro = "Este campo é obrigatório";
         } else {
             $name = test_input($_POST["name"]);
         }

         if (empty($_POST["email"])) {
             $emailErro = "Este campo é obrigatório";
        } else {
            $email = test_input($_POST["email"]);
        }

        if (empty($_POST["password"])) {
             $senhaErro = "Este campo é obrigatório";
         } else {
             $senha = test_input($_POST["password"]);
         }

         if (empty($_POST["passwordConfirm"])) {
             $senhaConfirmaErro = "Este campo é obrigatório";
         } else {
             $senhaConfirma = test_input($_POST["passwordConfirm"]);
         }

        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO Usuario (nomeUsuario, emailUsuario, senhaUsuario) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nome, $email, $senha);

        // set parameters and execute
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['password'];

        $stmt->execute();

        echo "New records created successfully";

        $stmt->close();
        $conn->close();
    }
?>


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
    <form action="questionario.php" method="post">
  
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

