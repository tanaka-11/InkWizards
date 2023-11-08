<?php

use Inkwizards\Usuario;

    require_once "inc/cabecalho.php";
    $usuario = new Usuario;

    $dadosUsuario = $usuario->exibir();
?>
<h1 class="text-center m-3">Contato</h1>
<section class="d-flex justify-content-center container">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
        <?php foreach($dadosUsuario as $umUsuario){
            if($umUsuario['tipo'] === 'admin'){ ?>
                <div class="col">
                    <div class="card m-3 text-center text-bg-dark">
                        <div class="row g-0">
                            <div class="col-4">
                                <img src="assets/images/perfil/<?=$umUsuario['foto_perfil'];?>" class="img-fluid rounded-start foto-perfil" alt="Imagem do perfil">
                            </div>
            
                            <div class="col-8">
                            <div class="card-body">
                                <h5 class="card-title"><?=$umUsuario['nome']?></h5>
                                <p class="card-text"><?=$umUsuario['descricao']?></p>
                            </div>
            
                            <!-- FAZER METODO PARA APARECER PORTFOLIO (Na classe Usuario) -->
                            
                            <div class="card-body">
                                <a href="artista.php?id=<?=$umUsuario['id']?>" class="btn btn-danger">Clique para entrar em contato</a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
        } ?>
    </div>
</section>
<?php require_once "inc/rodape.php"; ?>