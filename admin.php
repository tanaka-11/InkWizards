<?php

use Inkwizards\Usuario;

    require_once "inc/cabecalho.php";

    $usuario = new Usuario;
    $usuario->setId($_GET['id']);
    $dadosUsuario = $usuario->exibirUm();
?>
<section class="container">
    
<div class="card text-bg-dark text-center m-3 p-3" style="width: 100%;">
    <p class="text-start"><a class="btn btn-primary" href="contato.php">Voltar</a></p>
    <div id="foto-de-perfil">
        <img src="assets/images/perfil/<?= $dadosUsuario['foto_perfil'] ?>" class="card-img-top foto-perfil" alt="Foto de perfil">
    </div>

    <div class="card-body">
        <h3 class="card-title"> <?= $dadosUsuario['nome'] ?> </h5>
        <p class="card-text"><?= $dadosUsuario['descricao'] ?></p>
        <p class="card-text"><?= $dadosUsuario['email'] ?></p>
    </div>


    <?php if (empty($dadosLocalizacao)) { ?>
        <p>
            <a class="btn btn-outline-primary" href="localizacao-inserir.php">Adicionar localização</a>
        </p>
    <?php } else { ?>
        <p>
            <?= $dadosLocalizacao['endereco'] ?> <br>
            <a class="btn btn-outline-primary" href="localizacao-atualizar.php?id=<?= $dadosLocalizacao['id'] ?>">Editar</a>
            <a class="btn btn-outline-danger" href="localizacao-excluir.php?id=<?= $dadosLocalizacao['id'] ?>">Excluir</a>
        </p>
    <?php } ?>

    <?php if (!empty($dadosContato)) { ?>
        <p><?=$dadosContato['celular']?></p>
    <?php } ?>

    <div class="card-body">
        <a class="btn btn-outline-danger" href="perfil-atualizar.php">Editar Dados de Perfil</a>
    </div>
</div>

</section>

<?php require_once "inc/rodape.php"; ?>