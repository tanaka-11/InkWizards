<?php
use Inkwizards\{Portfolio};
require_once "../inc/cabecalho-admin.php";

$portfolio = new Portfolio;
$portfolio->usuario->setTipo($_SESSION['tipo']);
$portfolio->usuario->setId($_SESSION['id']);

$dadosPortfolio = $portfolio->exibirUsuario();
$dadosEstilo = $portfolio->estilo->exibir();
?>

<section class="container">
    <h1 class="text-center">Portfolio</h1>
    <p><a class="btn btn-primary" href="portfolio-inserir.php">Inserir portfolio</a></p>

<?php foreach($dadosPortfolio as $umPortfolio){ ?>
        <div id="imagemPortfolio">
            <img src="../assets/images/portfolio/<?=$umPortfolio['imagem']?>" alt="Foto do portfolio">
        </div>
        
        <p><?=$umPortfolio['descricao']?></p> 
        
        <p><?=$dadosEstilo[$umPortfolio['estilo_id'] - 1]['nome']?></p>
        
        <a class="btn btn-warning" href="portfolio-atualizar.php?id=<?=$umPortfolio['id']?>">Atualizar</a>
        <a class="btn btn-danger" href="portfolio-excluir.php?id=<?=$umPortfolio['id']?>">Excluir</a>
<?php } ?>

        
    </section>    
<?php 
require_once "../inc/rodape.php";
?>