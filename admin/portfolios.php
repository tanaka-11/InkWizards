<?php
use Inkwizards\{Portfolio};
require_once "../inc/cabecalho-admin.php";

$portfolio = new Portfolio;
$portfolio->usuario->setTipo($_SESSION['tipo']);
$portfolio->usuario->setId($_SESSION['id']);

$dadosPortfolio = $portfolio->exibirUsuario();
$dadosEstilo = $portfolio->estilo->exibir();
?>

<section>
    <h1 class="text-center m-3 p-3">Seu portfolio</h1>
    <p class="text-center">
        <a class="btn btn-outline-danger" href="portfolio-inserir.php">Inserir tatuagem</a>
    </p>

<div class="d-flex justify-content-md-between">
<?php foreach($dadosPortfolio as $umPortfolio){ ?>
    <div class="card m-3 text-bg-dark ">

        <div class="card-body">
            <p><?=$dadosEstilo[$umPortfolio['estilo_id'] - 1]['nome']?></p>    
            <p><?=$umPortfolio['descricao']?></p>
            
            <div style="text-align: center;" id="imagemPortfolio">
                <img src="../assets/images/portfolio/<?=$umPortfolio['imagem']?>" alt="Foto tatuagem" class="card-img-bottom foto-portfolio">
            </div>

            <p class="m-3 text-center">
                <a class="btn btn-outline-primary" href="portfolio-atualizar.php?id=<?=$umPortfolio['id']?>">Atualizar</a>

                <a class="btn btn-outline-danger" href="portfolio-excluir.php?id=<?=$umPortfolio['id']?>">Excluir</a>
            </p>

        </div>
    </div>
<?php } ?>
</div>


        
    </section>    
<?php 
require_once "../inc/rodape.php";
?>