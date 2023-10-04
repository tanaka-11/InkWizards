<?php 
// Require do Header e Funções
require_once "./includes/cabecalho.php"; 
require_once "./src/funcoes.php";

if(isset ($_POST['add-att'])) {
    $cep = filter_input(INPUT_POST, "cep", FILTER_SANITIZE_SPECIAL_CHARS);

    $endereco = filter_input(INPUT_POST, "endereco", FILTER_SANITIZE_SPECIAL_CHARS);

    $numero = filter_input(INPUT_POST, "numero", FILTER_SANITIZE_NUMBER_INT);

    $bairro = filter_input(INPUT_POST, "bairro", FILTER_SANITIZE_SPECIAL_CHARS);

    $complemento = filter_input(INPUT_POST, "complemento", FILTER_SANITIZE_SPECIAL_CHARS);
    
    // atualizarLocalizacao($conexao, $cep, $endereco, $numero, $bairro, $complemento);

}

?>

    
    <h1 class="titulo-cadastro">Localização</h1>

    <p>
        <a class="botao-voltar" href="perfil-logado.php">Voltar</a>
    </p>

    <form action="#" method="post" class="form-cadastro">
        <div>
            <input type="number" name="cep" id="cep" placeholder="CEP" required>
        </div>

        <section class="form-rua-numero">
            <div class="div-rua">
                <input type="text" name="endereco" id="endereco" placeholder="Endereço" required>
            </div>

            <div class="div-numero-casa">
                <input type="number" name="numero" id="numero" placeholder="Número" required>
            </div>
        </section>

        <section class="form-bairro-complemento">
            <div>
                <input type="text" name="bairro" id="bairro" placeholder="Bairro" required>
            </div>

            <div>
                <input type="text" name="complemento" id="complemento" placeholder="Complemento" required>
            </div>
        </section>

        <div>
            <button type="submit" name="add-att">Adicionar</button>
        </div>

    </form>
<?php require "./includes/rodape.php"; ?>