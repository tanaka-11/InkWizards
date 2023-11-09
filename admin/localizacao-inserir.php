<?php 
// Require do autoload e use do namespace
use Inkwizards\{Localizacao};

// Require do cabeçalho
require_once '../inc/cabecalho-admin.php';

// Criação dos objetos
$localizacao = new Localizacao;


if(isset ($_POST['inserir'])) {
    
    // Sanitização
    $localizacao->setCep($_POST['cep']);
    $localizacao->setEndereco($_POST['endereco']);
    $localizacao->setNumero($_POST['numero']);
    $localizacao->setBairro($_POST['bairro']);
    $localizacao->setComplemento($_POST['complemento']);
    $localizacao->usuario->setId($_SESSION['id']);
    
    // Acesso da classe atraves do objeto
    $localizacao->inserir();

    header("location:meu-perfil.php");

}

?>
    <!-- COMEÇO HTML -->
    <section class="container">
        <h1 class="text-center m-3">Localização</h1>
        <form action="#" method="post" class="form-cadastro">
            <p><a class="btn btn-danger" href="meu-perfil.php">Voltar</a></p>
            <div class="form-floating m-3">
                <input class="form-control" type="text" name="cep" id="cep" placeholder="" maxlength="9" required>
                <label for="cep">CEP:</label>
                <button id="localizar-cep" class="btn btn-primary">Localizar CEP</button>
                <b id="status"></b>
            </div>
            <div class="form-floating m-3">
                <input class="form-control" type="text" name="endereco" id="endereco" placeholder="" required>
                <label for="endereco">Endereço:</label>
            </div>
            <div class="form-floating m-3">
                <input class="form-control" type="number" name="numero" id="numero" placeholder="" required>
                <label for="numero">Número:</label>
            </div>
            <div class="form-floating m-3">
                <input class="form-control" type="text" name="bairro" id="bairro" placeholder="" required>
                <label for="bairro">Bairro:</label>
            </div>
            <div class="form-floating m-3">
                <input class="form-control" type="text" name="complemento" id="complemento" placeholder="">
                <label for="complemento">Complemento:</label>
            </div>
            <div class="m-3">
                <button class="btn btn-danger" type="submit" name="inserir">Adicionar</button>
            </div>
        </form>
    </section>

<?php require_once '../inc/rodape.php'; ?>