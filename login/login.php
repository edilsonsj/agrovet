<?php 

    include('../config.php');

    if(isset($_POST['email']) || isset($_POST['pass'])){
        if(strlen($_POST['email']) == 0){
            echo "Preencha seu email";
        }else if(strlen($_POST['pass']) == 0){
            echo "Preencha sua senha";
        } else {

            $email = $mysqli->real_escape_string($_POST['email']);
            $senha = $mysqli->real_escape_string($_POST['pass']);
    
         $sql_code = "SELECT * FROM agrovet.user WHERE email = '$email' AND password = '$senha'";

            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código sql: " . $mysqli->error);
    
            $quantidade =  $sql_query->num_rows;

         if ($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['iduser'] = $usuario['iduser'];
            $_SESSION['name'] = $usuario['nome'];

            header("Location: ../homeUser.php");
         } else {
            echo "Falha ao logar! E-mail e senhas incorretos!";
         }
        }
    }
session_start();
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <div class="header">
        <a href="../home.php" class="hlogo"><img src="../images/logo_extended.png" alt=""></a>
        <div class="header_right">
          <a class="login" href="#login">LOGIN</a>
          <a class="cadastro" href="../register/register.php">CADASTRO</a>
          <a class="adm" href="../Admin/admin_panel.php">ADM</a>
        </div>
      </div>

    <div id="main">
        <form id="box" method="POST">
            <div id="All">
                <div id="login">FAZER LOGIN</div>
                <input type="email" name="email" id="emailLogin" placeholder="e-mail">
                <input type="password" name="pass" id="passwordLogin" placeholder="senha">
                <div class="checkbox">
                    <input type="checkbox" name="signed">
                    <span>Manter-me conectado</span>
                </div>
                <button type="submit" id="continueButton">Entrar</button>
                <div id="registerDiv">
                    <span>Não tem uma conta?</span><br>
                    <button id="registerButton"><a href="../Register/register.php" >REGISTRE-SE</a></button>
                </div>
            </div>
        </form>
    </div>
    
    <div class="footer">
        Cardoso Agrovet  © 2022 - Todos os direitos reservados<br>
        Rua Alexandre Ferreira, 48 - Barão de Camaçari, Catu CEP: 48110-000 - CNPJ: 47.845.005/0001-89
    </div>

</body>

</html>