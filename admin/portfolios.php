<?php
use Inkwizards\{Portfolio};
require_once "../inc/cabecalho-admin.php";

$portfolio = new Portfolio;
$portfolio->usuario->setTipo($_SESSION['tipo']);
$portfolio->usuario->setId($_SESSION['id']);

$dadosPortfolio = $portfolio->exibirUsuario();
$dadosEstilo = $portfolio->estilo->exibir();
?>

<section class="container" style="width: 550px;">
    <h1 class="text-center m-3 p-3">Seu portfolio</h1>
    <p class="text-center">
        <a class="btn btn-outline-danger" href="portfolio-inserir.php">Inserir tatuagem</a>
    </p>

<?php foreach($dadosPortfolio as $umPortfolio){ ?>
    <div class="card m-3 text-bg-dark text-center">

        <div class="card-body">
            <p><?=$umPortfolio['descricao']?></p>
            <p><?=$dadosEstilo[$umPortfolio['estilo_id'] - 1]['nome']?></p>    
        
            <p>
                <a class="btn btn-outline-primary" href="portfolio-atualizar.php?id=<?=$umPortfolio['id']?>">Atualizar</a>

                <a class="btn btn-outline-danger" href="portfolio-excluir.php?id=<?=$umPortfolio['id']?>">Excluir</a>
            </p>

            <div style="text-align: center;" id="imagemPortfolio">
                <img src="../assets/images/portfolio/<?=$umPortfolio['imagem']?>" alt="Foto tatuagem" class="card-img-bottom foto-portfolio">
            </div>
        </div>
    </div>
<?php } ?>



        
    </section>    
<?php 
require_once "../inc/rodape.php";
?>