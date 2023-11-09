<?php
require_once '../vendor/autoload.php';
use Inkwizards\ControleDeAcesso;
$sessao = new ControleDeAcesso;
// $sessao->verificaAcesso();


$pagina = basename($_SERVER['PHP_SELF']);

$sessao->setPagina($pagina);
if(isset($_GET['sair'])) $sessao->logout($sessao->getPagina());

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

    <title><?=$titulo?></title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../assets/images/logo-VER1.png" type="image/x-icon">

</head>

<body>

<header>
    <nav class="navbar navbar-expand-md border-bottom bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php"><img src="../assets/images/logo-VER1.png" alt="Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav nav-underline me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <?php if($pagina === $_SERVER['PHP_SELF']) {?>
                        <li class="nav-item">
                            <a class="nav-link" href="meu-perfil.php">Meu Perfil</a>
                        </li>
                    <?php } ?>
                    <?php if($_SESSION['tipo'] === 'tatuador' || $_SESSION['tipo'] === 'admin') {?>
                        <li class="nav-item">
                            <a class="nav-link" href="portfolios.php">Portfolios</a>
                        </li>
                    <?php } ?>
                    <?php if($_SESSION['tipo'] === 'admin') {?>
                        <li class="nav-item">
                            <a class="nav-link" href="usuarios.php">Usuários</a>
                        </li>
                    <?php } ?>
                    <?php if($_SESSION['tipo'] === 'admin') {?>
                        <li class="nav-item">
                            <a class="nav-link" href="estilos.php">Estilos</a>
                        </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="meu-perfil.php">Meu Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?sair">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main>