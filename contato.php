<?php

use Inkwizards\Usuario;

    require_once "inc/cabecalho.php";
    $usuario = new Usuario;

    $dadosUsuario = $usuario->exibir();
?>

<h1 class="text-center m-3">Contato</h1>
<section class="container">
    <div class="row justify-content-center">
        <?php foreach($dadosUsuario as $umUsuario) {
            if($umUsuario['tipo'] === 'admin') { ?>
                <div class="col-12 col-md-6 col-lg-4" style="width: 700px;">
                    <div class="card m-3 text-center text-bg-dark">
                        <div class="row g-0">
                            <div class="col-4">
                                <img src="assets/images/perfil/<?=$umUsuario['foto_perfil'];?>" class="img-fluid rounded-start foto-perfil" alt="Imagem do perfil">
                            </div>
            
                            <div class="col-8">
                                <div class="card-body d-flex align-items-center">
                                    <div>
                                        <h5 class="card-title"><?=$umUsuario['nome']?></h5>
                                        <p class="card-text"><?=$umUsuario['descricao']?></p>
                                        <a href="admin.php?id=<?=$umUsuario['id']?>" class="btn btn-danger">Clique para entrar em contato</a>
                                    </div>
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