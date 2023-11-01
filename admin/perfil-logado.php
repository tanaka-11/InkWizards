<?php
use Inkwizards\{Usuario};
require "../inc/cabecalho-admin.php";

$usuario = new Usuario;
$usuario->setId($_SESSION['id']);

$dadosUsuario = $usuario->exibirUm();
?>
    <section class="container">
        <!-- AQUI SERÁ UMA TAG IMG (eu acho) -->
        <div id="foto-de-perfil">
            <img src="../assets/images/perfil/<?=$dadosUsuario['foto_perfil']?>" alt="Foto de perfil">
            <a href="perfil-atualizar.php">E</a>
        </div>
        
        <h1 class="nome-perfil">
            <?=$dadosUsuario['nome']?> <a href="perfil-atualizar.php">E</a>
        </h1>

        <p>
            <?=$dadosUsuario['email']?> <a href="perfil-atualizar.php">E</a>
        </p>

        <p>
            Senha (***) <a href="perfil-atualizar.php">E</a>
        </p>

        <p>
            <?=$dadosUsuario['descricao']?> <a href="perfil-atualizar.php">E</a>
        </p>

        <p>
            <a class="btn btn-primary" href="localizacao-inserir.php">Adicionar/Editar localização</a>
        </p>
        <p>
            <a class="btn btn-primary" href="contato-inserir.php">Adicionar/Editar contato</a>
        </p>
        <p>
            <a class="btn btn-primary" href="portfolio-inserir.php">Adicionar portfolio</a>
        </p>
        
    </section>

    
<?php require "../inc/rodape.php" ?>