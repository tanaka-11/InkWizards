<?php
use Inkwizards\{Portfolio};
require_once "../inc/cabecalho-admin.php";

$portfolio = new Portfolio;

$dadosPortfolio = $portfolio->exibir();
$dadosEstilo = $portfolio->estilo->exibir();

if(isset($_POST['inserir'])){
    $portfolio->setDescricao($_POST['descricao']);
    $portfolio->setEstiloId($_POST['estilo']);
    $portfolio->setUsuarioId($_SESSION['id']);

    $imagem = $_FILES['imagem'];
    $portfolio->usuario->upload($imagem, $pagina);
    $portfolio->setImagem($imagem['name']);
    $portfolio->inserir();

    // 
}

?>
<pre><?=var_dump($_SESSION['id'])?></pre>
<h1 class="text-center">Portfolio</h1>

<form action="#" method="post" class="container" enctype="multipart/form-data">
    <div class="form-floating m-3">
        <input class="form-control" type="file" name="imagem" id="imagem" placeholder="" accept="image/png, image/jpeg, image/gif, image/svg+xml">
        <label for="imagem">Inserir sua arte</label>
    </div>

    <div class="form-floating m-3">
        <textarea class="form-control" style="resize: none;" name="descricao" id="descricao" cols="50" rows="10" placeholder=""></textarea>
        <label for="descricao">Sobre sua arte:</label>
    </div>

    <div class="form-floating m-3">
        <select class="form-select" name="estilo" id="estilo">
                <option value="" disabled selected>Escolha um estilo</option>
            <?php foreach($dadosEstilo as $umEstilo){?>
                <option value="estilo"><?=$umEstilo['nome']?></option>
            <?php }?>
        </select>
            <label for="estilo">Estilos:</label>
    </div>

    <div class="m-3">
        <button class="btn btn-primary" type="submit" name="inserir">Inserir</button>
    </div>
</form>

<?php require_once "../inc/rodape.php"; ?>
