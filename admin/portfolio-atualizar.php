<?php
use Inkwizards\{Portfolio};
require_once "../inc/cabecalho-admin.php";
$sessao->verificaAcessoNaoCliente();

$portfolio = new Portfolio;

// Defina o ID do usuário e o ID do portfólio com base nos valores da sessão e da solicitação GET
$portfolio->usuario->setId($_SESSION['id']);
$portfolio->setId($_GET['id']);

$dadosPortfolio = $portfolio->exibirUm();
$dadosEstilo = $portfolio->estilo->exibir();

if(isset($_POST['atualizar'])) {
    $portfolio->estilo->setId($_POST['estilo']);
    // Imagem
    if(empty($_FILES['imagem']['name'])){
        $portfolio->setImagem($_POST['imagem-existente']);
    } else {
        $imagem = $_FILES['imagem'];
        $portfolio->usuario->upload($imagem, $pagina);
        $portfolio->setImagem($_FILES['imagem']['name']);
    }    

    $portfolio->setDescricao($_POST['descricao']);
    $portfolio->atualizar();
    header("location:portfolios.php");
}

?>

<section class="container">
    <h1 class="text-center m-3">Atualizar portfolio</h1>
    <form action="#" method="post" enctype="multipart/form-data">
        <!-- <div class="">
            <input class="form-control" type="file" name="imagemPortfolio" id="imagemPortfolio" accept="image/png, image/jpeg, image/gif, image/svg+xml">
        </div> -->

        <div class="form-floating m-3">
            <input value="<?=$dadosPortfolio['imagem']?>" class="form-control" type="text" id="imagem-existente" name="imagem-existente" readonly>
            <label for="imagem-existente" class="form-label">Imagem existente:</label>
            </div>

            <div class="form-floating m-3">
                <input class="form-control" type="file" id="imagem" name="imagem" accept="image/png, image/jpeg, image/gif, image/svg+xml">
                <label for="imagem" class="form-label">Caso queira mudar, selecione outra imagem:</label>
            </div>


        <div class="form-floating m-3">
            <select class="form-select" name="estilo" id="estilo" required>
                <option value=""></option>
                
                <?php foreach($dadosEstilo as $umEstilo) { ?>	
					<option <?php if($dadosPortfolio['estilo_id'] === $umEstilo['id']) echo " selected "?> value="<?=$umEstilo['id']?>">
                    <?=$umEstilo['nome']?>
                </option>
				<?php } ?>
                
                </select>
                <label class="form-label" for="estilo">Estilo:</label>
            </div>

        <div class="form-floating m-3">
                <textarea class="form-control" style="resize: none;" name="descricao" id="descricao" cols="30" rows="10" placeholder=""><?=$dadosPortfolio['descricao']?></textarea>
                <label for="descricao">Descrição</label>
            </div>

        <div class="m-3">
            <button type="submit" name="atualizar" class="btn btn-primary">Atualizar</button>
        </div>
    </form>
</section>