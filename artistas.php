<?php
use Inkwizards\{Portfolio, Usuario};
require_once "inc/cabecalho.php";

$usuario = new Usuario;
$portfolio = new Portfolio;

$dadosUsuario = $usuario->exibir();
// $dadosPortfolio = $portfolio->exibirUm();
// $portfolio->setId()

?>

<h1 class="text-center"> Nossos Artistas</h1>

<section class="d-flex justify-content-center container">
    <?php foreach($dadosUsuario as $umUsuario){ ?>
        <?php if($umUsuario['tipo'] === 'tatuador'){ ?>
        <div class="card  m-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                <img src="assets/images/perfil/<?=$umUsuario['foto_perfil'];?>" class="img-fluid rounded-start" alt="Imagem do perfil">
                </div>

                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?=$umUsuario['nome']?></h5>
                    <p class="card-text"><?=$umUsuario['descricao']?></p>
                </div>

                <!-- FAZER METODO PARA APARECER PORTFOLIO (Na classe Usuario) -->
                
                <div class="card-body">
                    <a href="artista?id=<?=$dadosUsuario['id']?>" class="btn btn-outline-primary">Clique para ver mais trabalhos</a>
                </div>
                </div>
            </div>
        </div>
        <?php }?>
    <?php } ?>
</section>