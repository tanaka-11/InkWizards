<?php
use Inkwizards\{Portfolio};
require_once "../inc/cabecalho-admin.php";

$portfolio = new Portfolio;

// Defina o ID do usuário e o ID do portfólio com base nos valores da sessão e da solicitação GET
$portfolio->usuario->setId($_SESSION['id']);
$portfolio->setId($_GET['id']);

$dados = $portfolio->exibirUm();
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
    <h1 class="text-center">Atualizar portfolio</h1>
    <form action="#" method="post" enctype="multipart/form-data">
        <!-- <div class="form-floating m-3">
            <input class="form-control" type="file" name="imagemPortfolio" id="imagemPortfolio" accept="image/png, image/jpeg, image/gif, image/svg+xml">
        </div> -->

        <div class="mb-3">
                <label for="imagem-existente" class="form-label">Imagem existente:</label>
                <!-- campo somente leitura, meramente informativo -->
                <input value="<?=$dados['imagem']?>" class="form-control" type="text" id="imagem-existente" name="imagem-existente" readonly>
            </div>

            <div class="mb-3">
                <label for="imagem" class="form-label">Caso queira mudar, selecione outra imagem:</label>
                <input class="form-control" type="file" id="imagem" name="imagem" accept="image/png, image/jpeg, image/gif, image/svg+xml">
            </div>


        <div class="form-floating m-3">
                <label class="form-label" for="estilo">Estilo:</label>
                <select class="form-select" name="estilo" id="estilo" required>
                    <option value=""></option>

                <?php foreach($dadosEstilo as $umEstilo) { ?>	
					<option <?php if($dados['estilo_id'] === $umEstilo['id']) echo " selected "?> value="<?=$umEstilo['id']?>">
						<?=$umEstilo['nome']?>
					</option>
				<?php } ?>

                </select>
            </div>

        <div class="form-floating m-3">
                <textarea name="descricao" id="descricao" cols="30" rows="10" placeholder="Preencha se for alterar:"></textarea>
            </div>

        <div class="m-3">
            <button type="submit" name="atualizar" class="btn btn-primary">Atualizar</button>
        </div>
    </form>
</section>