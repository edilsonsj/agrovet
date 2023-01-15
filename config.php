<?php
    define('HOST', 'localhost:3307');
    define('USER', 'root');
    define('PASS', '');
    define('BASE', 'agrovet');

    $conn = mysqli_connect(HOST, USER, PASS, BASE); 

    $mysqli = $conn;

    if (!$conn) {
        die("Conexao falhou" . mysqli_connect_error());
    } else {
        ##echo "Conectado com sucesso";
    }
?>