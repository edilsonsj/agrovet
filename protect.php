<?php 

if(!isset($_SESSION)){
    session_start();
}

if (!isset($_SESSION['iduser'])) {
    die("Voce não pode acessar esta página porque não está logado. <p><a href=\"home.php\">Página inicial</a> </p>");
}

?>