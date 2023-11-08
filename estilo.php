<?php
    require_once "inc/cabecalho.php";
?>
<section class="portfolio">
    <h2 class="text-center m-3 p-3">Tatuagens Destaque</h2>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($dadosPortfolio as $umPortfolio) { ?>
                <div class="col mb-4">
                    <div class="card text-bg-dark">
                        <img src="assets/images/portfolio/<?= $umPortfolio['imagem'] ?>" class="card-img foto-portfolio align-self-center w-100" alt="...">

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