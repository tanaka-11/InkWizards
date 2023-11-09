<?php

use Inkwizards\Portfolio;

    require_once "inc/cabecalho.php";

    $portfolio = new Portfolio;
    $portfolio->usuario->setId($_GET['id']);
    $dadosUsuario = $portfolio->usuario->exibirUm();
    $dadosPortfolio = $portfolio->exibirPorUsuario();
?>
<section class="container">
    
<div class="card text-bg-dark text-center m-3 p-3" style="width: 100%;">
    <p class="text-start"><a class="btn btn-danger" href="artistas.php">Voltar</a></p>
    <div id="foto-de-perfil">
        <img src="assets/images/perfil/<?= $dadosUsuario['foto_perfil'] ?>" class="card-img-top foto-perfil" alt="Foto de perfil">
    </div>

    <div class="card-body">
        <h3 class="card-title"> <?= $dadosUsuario['nome'] ?> </h5>
        <p class="card-text"><?= $dadosUsuario['descricao'] ?></p>
        <p class="card-text"><?= $dadosUsuario['email'] ?></p>
    </div>


    <?php if (!empty($dadosLocalizacao)) { ?>
        <p><?=$dadosLocalizacao['endereco']?></p>
    <?php } ?>

    <?php if (!empty($dadosContato)) { ?>
        <p><?=$dadosContato['celular']?></p>
    <?php } ?>
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

<?php require_once "inc/rodape.php"; ?>