<?php
use Inkwizards\{Portfolio};
require_once "../inc/cabecalho-admin.php";

$portfolio = new Portfolio;
$portfolio->setId($_GET['id']);

$dadosPortfolio = $portfolio->exibirUm();

if(isset($_POST['atualizar'])) {
    // Imagem
    if(empty($_FILES['imagem']['name'])){
        $portfolio->setImagem($_POST['imagemPortfolio']);
    } else {
        $portfolio->upload($_FILES['imagem']);
        $portfolio->setImagem($_FILES['imagem']['name']);
    }    

    $portfolio->setDescricao($_POST['descricao']);
    $portfolio->atualizar();
    header("location:portfolios.php");
}
?>

<section class="container">
    <h1 class="text-center">Atualizar portfolio</h1>
    <form action="#" method="post">
        <div class="form-floating m-3">
            <input class="form-control" type="file" name="imagemPortfolio" id="imagemPortfolio" accept="image/png, image/jpeg, image/gif, image/svg+xml">
        </div>
<!-- 
        <div class="mb-3">
                <label for="imagem" class="form-label">Caso queira mudar, selecione outra imagem:</label>
                <input class="form-control" type="file" id="imagem" name="imagem" accept="image/png, image/jpeg, image/gif, image/svg+xml">
            </div> -->


        <div class="form-floating m-3">
                <textarea name="descricao" id="descricao" cols="30" rows="10" placeholder="Preencha se for alterar:"></textarea>
            </div>

        <div class="m-3">
            <button type="submit" name="atualizar" class="btn btn-primary">Atualizar</button>
        </div>
    </form>
</section>