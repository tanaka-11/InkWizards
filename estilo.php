<?php

use Inkwizards\Portfolio;

    require_once "inc/cabecalho.php";

    $portfolio = new Portfolio;
    $portfolio->estilo->setId($_GET['id']);
    $dadosPortfolio = $portfolio->exibirPorEstilo();
?>
<section class="portfolio">
    <h2 class="text-center m-3 p-3">Tatuagens</h2>
    <div class="container">
        <p class="text-center"><a class="btn btn-danger" href="estilos.php">Voltar</a></p>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php if (count($dadosPortfolio) === 1) { ?>
                <div class="col col-md-6 mx-auto">
            <?php } ?>
            <?php foreach ($dadosPortfolio as $umPortfolio) { ?>
                <div class="col mb-4">
                    <div class="card text-bg-dark">
                        <img src="assets/images/portfolio/<?= $umPortfolio['imagem'] ?>" class="card-img foto-portfolio w-100 h-100" alt="..." style="min-height: 460px;">

                        <div class="card-img-overlay">
                            <h5 class="card-title"><?= $umPortfolio['estilo'] ?></h5>
                            <p class="card-text"><?= $umPortfolio['descricao'] ?></p>
                            <p class="card-text"><small><?= $umPortfolio['usuario'] ?></small></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php require_once "inc/rodape.php"; ?>