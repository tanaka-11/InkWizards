<?php
use Inkwizards\{Portfolio};
require_once "../inc/cabecalho-admin.php";

$portfolio = new Portfolio;

$dadosPortfolio = $portfolio->exibir();
?>

<section class="container">
<?php foreach($dadosPortfolio as $umPortfolio){?>    
        <div id="imagemPortfolio">
            <img src="../assets/images/portfolio/<?=$umPortfolio['imagem']?>" alt="Foto do portfolio">
            <a href="portfolio-atualizar.php?id=<?=$umPortfolio['id']?>">Editar</a>
        </div>

        <h2>
            <?=$umPortfolio['descricao']?> <a href="portfolio-atualizar.php?id=<?=$umPortfolio['id']?>">Editar</a>
        </h2>
        <?php } ?>
    </section>    
<?php 
require_once "../inc/rodape.php";
?>