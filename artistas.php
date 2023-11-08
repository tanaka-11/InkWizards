<?php
use Inkwizards\{Portfolio, Usuario};
require_once "inc/cabecalho.php";

$usuario = new Usuario;
$portfolio = new Portfolio;

$dadosUsuario = $usuario->exibir();
// $dadosPortfolio = $portfolio->exibirUm();
// $portfolio->setId()

?>

<h1 class="text-center m-3"> Nossos Artistas</h1>
<section class="container">
    <div class="row">
        <?php foreach ($dadosUsuario as $umUsuario) { ?>
            <?php if ($umUsuario['tipo'] === 'tatuador') { ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card text-bg-dark m-4">
                        <div class="row g-0">
                            <div class="col-md-7">
                                <img src="assets/images/perfil/<?= $umUsuario['foto_perfil'] ?>" class="card-img foto-portfolio w-100" alt="Imagem do perfil">
                            </div>

                            <div class="col-md-5">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $umUsuario['nome'] ?></h5>
                                    <p class="card-text"><?= $umUsuario['descricao'] ?></p>
                                </div>

                                <div class="card-body text-center">
                                    <a href="artista.php?id=<?= $umUsuario['id'] ?>" class="btn btn-outline-danger">Veja mais</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</section>
<?php require_once 'inc/rodape.php'; ?>