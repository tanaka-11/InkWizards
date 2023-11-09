<?php

use Inkwizards\Localizacao;

    require_once "../inc/cabecalho-admin.php";

    $localizacao = new Localizacao;
    $localizacao->usuario->setId($_SESSION['id']);
    $dadosLocalizacao = $localizacao->exibirUm();

    if(isset($_POST['atualizar'])) {
        $localizacao->setId($_GET['id']);
        $localizacao->setCep($_POST['cep']);
        $localizacao->setEndereco($_POST['endereco']);
        $localizacao->setNumero($_POST['numero']);
        $localizacao->setBairro($_POST['bairro']);
        $localizacao->setComplemento($_POST['complemento']);

        $localizacao->atualizar();
        header("location:meu-perfil.php");
    }
?>
<section class="container">
        <h1 class="text-center m-3">Localização</h1>
        <form action="#" method="post" class="form-cadastro">
            <p><a class="btn btn-danger" href="meu-perfil.php">Voltar</a></p>
            <div class="form-floating m-3">
                <input value="<?=$dadosLocalizacao['cep']?>" class="form-control" type="number" name="cep" id="cep" placeholder="" required>
                <label for="cep">CEP:</label>
            </div>
            <div class="form-floating m-3">
                <input value="<?=$dadosLocalizacao['endereco']?>" class="form-control" type="text" name="endereco" id="endereco" placeholder="" required>
                <label for="endereco">Endereço:</label>
            </div>
            <div class="form-floating m-3">
                <input value="<?=$dadosLocalizacao['numero']?>" class="form-control" type="number" name="numero" id="numero" placeholder="" required>
                <label for="numero">Número:</label>
            </div>
            <div class="form-floating m-3">
                <input value="<?=$dadosLocalizacao['bairro']?>" class="form-control" type="text" name="bairro" id="bairro" placeholder="" required>
                <label for="bairro">Bairro:</label>
            </div>
            <div class="form-floating m-3">
                <input value="<?=$dadosLocalizacao['complemento']?>" class="form-control" type="text" name="complemento" id="complemento" placeholder="">
                <label for="complemento">Complemento:</label>
            </div>
            <div class="m-3">
                <button class="btn btn-danger" type="submit" name="atualizar">Atualizar</button>
            </div>
        </form>
    </section>
<?php require_once "../inc/rodape.php"; ?>