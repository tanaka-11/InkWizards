<?php

use Inkwizards\Estilo;

    require_once "../inc/cabecalho-admin.php";
    $sessao->verificaAcessoAdmin();

    $estilo = new Estilo;
    $estilo->setId($_GET['id']);
    $dadosEstilo = $estilo->exibirUm();

    if(isset($_POST['atualizar'])) {
        $estilo->setNome($_POST['nome']);
        $estilo->atualizar();
        header("location:estilos.php");
    }
?>
<section class="container">
    <h1 class="text-center">Atualizar</h1>
    <form action="#" method="post">
        <div class="form-floating m-3">
            <input type="text" name="nome" id="nome" class="form-control" placeholder="" value="<?=$dadosEstilo['nome']?>">
            <label for="nome">Nome:</label>
        </div>
        <div class="m-3">
            <button type="submit" name="atualizar" class="btn btn-primary">Atualizar</button>
        </div>
    </form>
</section>