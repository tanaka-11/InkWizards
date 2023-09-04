<?php
// Obtém o nome do arquivo PHP atual
$pagina = basename($_SERVER['PHP_SELF']);

// Define constantes para os títulos das páginas
define("TITULO_INICIAL", "Página Inicial");
define("TITULO_ESTILOS", "Página Estilos");
define("TITULO_CONTATO", "Página de Contato");
define("TITULO_LOGIN", "Página de Login");

// Define um valor padrão para o título
$titulo = "InkWizards";

// Utiliza o operador match para definir o título com base na página atual
$titulo = match($pagina) {
    "index.php" => TITULO_INICIAL,
    "estilos.php" => TITULO_ESTILOS,
    "contato.php" => TITULO_CONTATO,
    "login.php" => TITULO_LOGIN,
    default => $titulo // Valor padrão
};
?>


<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?=$titulo?> - InkWizards</title>

    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

<header>
    <div class="navegacao">
        <img src="./assets/logo-VER1.png" class="logo" alt="InkWizards">
        
        <nav>
            <a href="#">Home</a>
            <a href="#">Artistas</a>
            <a href="#">Estilos</a>
            <a href="#">Contato </a>
            <a href="#">Login</a>
        </nav>
    </div>
</header>
