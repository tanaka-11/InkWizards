<?php
use Inkwizards\{Portfolio};
require_once "../inc/cabecalho-admin.php";
$sessao->verificaAcessoNaoCliente();

$portfolio = new Portfolio;
$portfolio->usuario->setTipo($_SESSION['tipo']);
$portfolio->usuario->setId($_SESSION['id']);

if($_SESSION['tipo'] === 'admin'){
    $dadosPortfolio = $portfolio->exibirComEstilo();
} elseif($_SESSION['tipo'] === 'tatuador') {
    $dadosPortfolio = $portfolio->exibirPorUsuario();
}
?>

<section>
    <h1 class="text-center m-3 p-3">Seu portfolio</h1>
    <p class="text-center">
        <a class="btn btn-outline-danger" href="portfolio-inserir.php">Inserir tatuagem</a>
    </p>

<div class="d-flex justify-content-center">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
        <?php foreach($dadosPortfolio as $umPortfolio){ ?>
            <div class="col">
                <div class="card m-3 text-bg-dark ">
    
                    <div class="card-body">
                        <?php if($_SESSION['tipo'] === "admin") { ?>
                            <h3><?=$umPortfolio['usuario']?></h3>
                        <?php } ?>
                        <p><?=$umPortfolio['estilo']?></p>    
                        <p><?=$umPortfolio['descricao']?></p>
                        
                        <div style="text-align: center;" id="imagemPortfolio">
                            <img src="../assets/images/portfolio/<?=$umPortfolio['imagem']?>" alt="Foto tatuagem" class="card-img-bottom foto-portfolio">
                        </div>
    
                        <p class="m-3 text-center">
                            <a class="btn btn-outline-primary" href="portfolio-atualizar.php?id=<?=$umPortfolio['id']?>">Atualizar</a>
    
                            <a class="btn btn-outline-danger excluir" href="portfolio-excluir.php?id=<?=$umPortfolio['id']?>">Excluir</a>
                        </p>
    
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

        
    </section>    
<?php 
require_once "../inc/rodape.php";
?>