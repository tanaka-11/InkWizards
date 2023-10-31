<?php
use Inkwizards\{Usuario};
require "../inc/cabecalho-admin.php";

$usuario = new Usuario;
// $usuario->setId($_SESSION['id']);

$dadosUsuario = $usuario->exibirUm();
?>
    <section class="dados-perfil">
        <!-- AQUI SERÁ UMA TAG IMG (eu acho) -->
        <div id="foto-de-perfil">
            <a href="atualizar-perfil.php">E</a>
        </div>
        
        <h1 class="nome-perfil">
            <?=$dadosUsuario['nome']?> <a href="atualizar-perfil.php">E</a>
        </h1>

        <p>
            <?=$dadosUsuario['email']?> <a href="atualizar-perfil.php">E</a>
        </p>

        <p>
            Senha (***) <a href="atualizar-perfil.php">E</a>
        </p>

        <p>
            <?=$dadosUsuario['descricao']?> <a href="atualizar-perfil.php">E</a>
        </p>

        <p>
            <a href="inserir-localizacao.php">Adicionar/Editar localização</a>
        </p>
        <p>
            <a href="inserir-contato.php">Adicionar/Editar contato</a>
        </p>
        <p>
            <a href="inserir-portfolio">Adicionar portfolio</a>
        </p>
        
    </section>

    
<?php require "../inc/rodape.php" ?>