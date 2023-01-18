<?php 

    include('../agrovet/config.php');
    


?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRE-SE</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    

    <div class="header">
      <a href="home.php" class="hlogo"><img src="../agrovet/images/logo_extended.png" alt=""></a>
      <div class="header_right">
        <a class="login" href="#login">LOGIN</a>
        <a class="cadastro" href="#cadastro">CADASTRO</a>
        <a class="adm" href="admin_panel.php">ADM</a>
      </div>      
    </div>


    <div id="main" >
        <form id="box" action="process.php" method="POST">
            <div id="All">
                <div id="register">CADASTRE-SE</div>
                    <div>
                        <input type="text" name="name" id="nameRegister" placeholder="Nome" required>

                        <input type="text" name="cpf" id="tax" placeholder="CPF" required>

                        <br>
                        <label class="data" for="date">Data de nascimento</label><br>
                        <input class="data" type="date" name="birthdate" id="birthdate" placeholder="Data de Nascimento" required>
                        <br>
                        <input type="email" name="email" id="emailRegister" placeholder="Email" required>
                        <input type="tel" name="phone" id="phoneRegister" placeholder="Telefone" required>
                        <input type="password" name="password" id="passwordRegister" placeholder="Senha" required>
                    </div>
                <button type="submit" id="continueButton">CRIAR CONTA</button>
            </div>
        </form>
    </div>
    <footer>
        Cardoso Agrovet  © 2022 - Todos os direitos reservados<br>
        Rua Alexandre Ferreira, 48 - Barão de Camaçari, Catu CEP: 48110-000 - CNPJ: 47.845.005/0001-89
    </footer>
</body>
</html>