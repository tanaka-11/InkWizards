<?php
use Inkwizards\{Estilo, Usuario};
require_once 'inc/cabecalho.php';

$usuario = new Usuario;
$estilo = new Estilo;


$dadosUsuario = $usuario->exibir();
$dadosEstilo = $estilo->exibir();


?>

<h1 class="text-center m-3">Artistas Destaque</h1>
<div class="container">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
        <?php foreach ($dadosUsuario as $umUsuario) { ?>
            <?php if ($umUsuario['tipo'] === 'tatuador') { ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card text-bg-dark m-4">
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="assets/images/perfil/<?= $umUsuario['foto_perfil'] ?>" class="card-img foto-portfolio" alt="Imagem do perfil">
                            <div class="card-img-overlay">
                                <h5 class="card-title"><?= $umUsuario['nome'] ?></h5>
                            </div>
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


<!-- 
    <section class="contatos">
        <h1 class="text-center">Contato</h1>
        <div class="botao-contato text-center">
            <p>
                <a class="btn btn-outline-danger" href="contato.php">Contato</a>
            </p>
        </div>
        
        </div>
    </section>     -->
    
    <!-- <section class="cadastro">

    <h1 class="text-center">Cadastro/Login</h1>

        <div class="cadastro-login text-center">
            <p  class="botao-cadastro">
                <a class="btn btn-primary" href="cadastro.php">Cadastro</a>
                <a class="btn btn-primary" href="login.php">Login</a>
            </p>
        </div>
            
    </section> -->


<?php require_once "inc/rodape.php" ?>