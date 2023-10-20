<?php 
// Require do autoload e use do namespace
use Inkwizards\{Localizacao, Tatuador};
require_once '../vendor/autoload.php';

// Require do cabeçalho
require_once './includes/cabecalho.php';

// Criação dos objetos
$localizacao = new Localizacao;
$tatuador = new Tatuador;


// Chamando metodos
$dadosDoTatuador = $tatuador->exibir();
$dadosDaLocalizacao = $localizacao->exibir();

if(isset ($_POST['add-att'])) {
    
    // Sanitização
    $localizacao->setCep($_POST['cep']);
    $localizacao->setEndereco($_POST['endereco']);
    $localizacao->setNumero($_POST['numero']);
    $localizacao->setBairro($_POST['bairro']);
    $localizacao->setComplemento($_POST['complemento']);
    $localizacao->setTatuadores_id($_POST['tatuadoresId']);
    
    // Acesso da classe atraves do objeto
    $localizacao->inserir();

}

?>
    <!-- COMEÇO HTML -->
    <h1 class="titulo-cadastro">Localização</h1>

    <p>
        <a class="botao-voltar" href="perfil-logado.php">Voltar</a>
    </p>

    <form action="#" method="post" class="form-cadastro">
        <!-- <input type="hidden" name="tatuadores_id"> -->
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

<?php require_once './includes/rodape.php'; ?>