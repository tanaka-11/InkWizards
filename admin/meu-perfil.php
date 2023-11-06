<?php
use Inkwizards\{Usuario, Localizacao, Contato, Portfolio};
require "../inc/cabecalho-admin.php";

$usuario = new Usuario;
$usuario->setId($_SESSION['id']);
$usuario->setTipo($_SESSION['tipo']);

$localizacao = new Localizacao;
$localizacao->usuario->setId($_SESSION['id']);
$dadosLocalizacao = $localizacao->exibirUm();

$contato = new Contato;
$contato->usuario->setId($_SESSION['id']);
$dadosContato = $contato->exibirUm();

$portfolio = new Portfolio;
$portfolio->usuario->setId($_SESSION['id']);
$dadosPortfolio = $portfolio->exibirUsuario();
$dadosEstilos = $portfolio->estilo->exibir();

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

        <?php foreach($dadosPortfolio as $umPortfolio){ ?>
            <div class="card m-3">
                <div class="card-header">
                    <p><?=$umPortfolio['descricao']?></p>
                </div>
                <div class="card-body">
                    <p><?=$dadosEstilos[$umPortfolio['estilo_id'] - 1]['nome']?></p>
                    <p><a class="btn btn-warning" href="portfolio-atualizar.php?id=<?=$umPortfolio['id']?>">Atualizar</a></p>
                    <p><a class="btn btn-danger" href="portfolio-excluir.php?id=<?=$umPortfolio['id']?>">Excluir</a></p>
                    <img src="../assets/images/portfolio/<?=$umPortfolio['imagem']?>" alt="Foto tatuagem" class="card-img-bottom">
                </div>
            </div>
        <?php } ?>
        
    </section>

    
<?php require "../inc/rodape.php" ?>