<?php
use Inkwizards\{Portfolio};
require_once "../inc/cabecalho-admin.php";

$portfolio = new Portfolio;

$dadosPortfolio = $portfolio->exibir();
$dadosEstilo = $portfolio->estilo->exibir();
?>

<section class="container">
    <h1 class="text-center">Portfolio</h1>
    <p><a class="btn btn-primary" href="portfolio-inserir.php">Inserir portfolio</a></p>
<?php foreach($dadosPortfolio as $umPortfolio){?>    
        <div id="imagemPortfolio">
            <img src="../assets/images/portfolio/<?=$umPortfolio['imagem']?>" alt="Foto do portfolio">
        </div>

        <p><?=$umPortfolio['descricao']?></p> 

        <?php foreach($dadosEstilo as $umEstilo){?>
            <p value="<?=$umEstilo['id']?>"><?=$umEstilo['nome']?></p>
        <?php }?>

        <a class="btn btn-warning" href="portfolio-atualizar.php?id=<?=$umPortfolio['id']?>">Atualizar</a>
        <a class="btn btn-danger" href="portfolio-excluir.php?id=<?=$umPortfolio['id']?>">Excluir</a>
<?php } ?>
        
    </section>    
<?php 
require_once "../inc/rodape.php";
?>