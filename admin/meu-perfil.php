<?php
use Inkwizards\{Usuario, Localizacao, Contato};
require "../inc/cabecalho-admin.php";

$usuario = new Usuario;
$usuario->setId($_SESSION['id']);

$localizacao = new Localizacao;
$localizacao->usuario->setId($_SESSION['id']);
$dadosLocalizacao = $localizacao->exibirUm();

$contato = new Contato;
$contato->usuario->setId($_SESSION['id']);
$dadosContato = $contato->exibirUm();

$dadosUsuario = $usuario->exibirUm();
?>
    <section class="container">
        <!-- AQUI SERÁ UMA TAG IMG (eu acho) -->
        <div id="foto-de-perfil">
            <img src="../assets/images/perfil/<?=$dadosUsuario['foto_perfil']?>" alt="Foto de perfil">
            <a href="perfil-atualizar.php">E</a>
        </div>
        
        <h1 class="nome-perfil"><?=$dadosUsuario['nome']?> <a href="perfil-atualizar.php">E</a></h1>

        <p><?=$dadosUsuario['email']?> <a href="perfil-atualizar.php">E</a></p>

        <p>Senha (***) <a href="perfil-atualizar.php">E</a></p>

        <p><?=$dadosUsuario['descricao']?> <a href="perfil-atualizar.php">E</a></p>

        <?php if(empty($dadosLocalizacao)) { ?>
            <p><a class="btn btn-primary" href="localizacao-inserir.php">Adicionar localização</a></p>
        <?php } else { ?>
            <p><?=$dadosLocalizacao['endereco']?> <a class="btn btn-primary" href="localizacao-atualizar.php?id=<?=$dadosLocalizacao['id']?>">E</a></p>
        <?php } ?>

        <?php if(empty($dadosContato)) { ?>
            <p><a class="btn btn-primary" href="contato-inserir.php">Adicionar contato</a></p>
        <?php } else { ?>
            <p><?=$dadosContato['celular']?> <a class="btn btn-primary" href="contato-atualizar.php?id=<?=$dadosContato['id']?>">E</a></p>
        <?php } ?>
        <p><a class="btn btn-primary" href="portfolio-inserir.php">Adicionar portfolio</a></p>
        
    </section>

    
<?php require "../inc/rodape.php" ?>