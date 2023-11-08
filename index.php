<?php
use Inkwizards\{Estilo, Portfolio, Usuario};
require_once 'inc/cabecalho.php';

$usuario = new Usuario;
$estilo = new Estilo;
$portfolio = new Portfolio;

$dadosUsuario = $usuario->exibir();
$dadosEstilo = $estilo->exibir();
$dadosPortfolio = $portfolio->exibirComEstilo();


?>

<h1 class="text-center m-3">Artistas Destaque</h1>
<div class="container">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
        <?php foreach ($dadosUsuario as $umUsuario) { ?>
            <?php if ($umUsuario['tipo'] === 'tatuador') { ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card text-bg-dark m-4">
                        
                            <img src="assets/images/perfil/<?= $umUsuario['foto_perfil'] ?>" class="card-img foto-portfolio align-self-center" alt="Imagem do perfil">
                            <div class="card-img-overlay">
                                <h5 class="card-title" style="color:#CB002D"><?= $umUsuario['nome'] ?></h5>
                            </div>
                      
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>
</section>


<section class="estilos">
    <h1 class="text-center">Estilos</h1>
    <div class="container text-center">
        <div class="row">
            <?php foreach ($dadosEstilo as $umEstilo) { ?>
                <div class="col-md-3">
                    <div class="card text-bg-dark m-4">
                        <div class="card-body d-flex align-items-center justify-content-center">
                            <h3 style="color: #CB002D; height: 60px;" class="card-text"><?=$umEstilo['nome']?></h3>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<section class="portfolio">
    <h1 class="text-center m-3 p-3">Tatuagens Destaque</h1>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($dadosPortfolio as $umPortfolio) { ?>
                <div class="col mb-4">
                    <div class="card text-bg-dark">
                        <img src="assets/images/portfolio/<?= $umPortfolio['imagem'] ?>" class="card-img foto-portfolio align-self-center" alt="...">

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






<?php require_once "inc/rodape.php" ?>