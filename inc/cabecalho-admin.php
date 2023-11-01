<?php
require_once '../vendor/autoload.php';
use Inkwizards\ControleDeAcesso;
$sessao = new ControleDeAcesso;
// $sessao->verificaAcesso();

if(isset($_GET['sair'])) $sessao->logout();


$pagina = basename($_SERVER['PHP_SELF']);

// Definindo constantes para os títulos das páginas.
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


<!-- Começo HTML  -->
<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?=$titulo?> - InkWizards</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>

<header class="m-3">
    <nav class="nav nav-underline justify-content-end">
        <a class="nav-link" href="../index.php">Home</a>
        <a class="nav-link" href="#">Artistas</a>
        <a class="nav-link" href="#">Estilos</a>
        <a class="nav-link" href="#">Contato</a>
        <a class="nav-link" href="../cadastro.php">Cadastro</a>
        <a class="nav-link" href="../login.php">Login</a>
        <a class="nav-link" href="?sair">Sair</a>
    </nav>
</header>

<main>