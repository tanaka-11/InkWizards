<?php
use Inkwizards\{Portfolio};
require_once "../inc/cabecalho-admin.php";

$portfolio = new Portfolio;

$dadosPortfolio = $portfolio->exibir();
?>

    <section class="container">
    <?php foreach($dadosPortfolio as $umPortfolio){?>
        <div id="portfolio">
            <img src="../assets/images/portfolio/<?=$umPortfolio['imagem']?>" alt="Imagem Portfolio">
            <a href="portfolio-atualizar.php">E</a>
        </div>
        
        <!-- <h1 class="nome-portfolio">
            <?=$umPortfolio['']?> <a href="portfolio-atualizar.php">E</a>
        </h1> -->

        <p>
            <?=$umPortfolio['descricao']?> <a href="portfolio-atualizar.php">E</a>
        </p>
    <?php } ?>    
    </section>