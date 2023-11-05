<?php
use Inkwizards\{Portfolio};
require_once "../inc/cabecalho-admin.php";

$portfolio = new Portfolio;

$dadosPortfolio = $portfolio->exibir();
$dadosEstilo = $portfolio->estilo->exibir();
?>

<section class="container">

<?php foreach($dadosPortfolio as $umPortfolio){?>    
        <div id="imagemPortfolio">
            <img src="../assets/images/portfolio/<?=$umPortfolio['imagem']?>" alt="Foto do portfolio">
            <a href="portfolio-atualizar.php?id=<?=$umPortfolio['id']?>">Editar</a>
        </div>

        <p>
            <?=$umPortfolio['descricao']?> <a href="portfolio-atualizar.php?id=<?=$umPortfolio['id']?>">Editar</a>
        </p> 

        <?php foreach($dadosEstilo as $umEstilo){?>
            <p value="<?=$umEstilo['id']?>"><?=$umEstilo['nome']?></p>
        <?php }?>
       

<?php } ?>
        
    </section>    
<?php 
require_once "../inc/rodape.php";
?>