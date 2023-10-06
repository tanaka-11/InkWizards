<?php 
// Require do Header e Funções
require_once "./includes/cabecalho.php"; 
require_once "./src/funcoes.php";

if(isset ($_POST['add-att'])) {
    // Chamando metodos
    // $dadosDoTatuador = $tatuador->verTatuadores();
    $dadosDaLocalizacao = $localizacao->exibir();
    
    // Sanitização
    $localizacao->setCep($_POST['cep']);
    $localizacao->setEndereco($_POST['endereco']);
    $localizacao->setNumero($_POST['numero']);
    $localizacao->setBairro($_POST['bairro']);
    $localizacao->setComplemento($_POST['complemento']);
    $localizacao->setTatuadoresId($_POST['tatuadoresId']);
    
    // Acesso de um metodo da classe atraves do objeto.
    $localizacao->inserir();

}

?>

    
    <h1 class="titulo-cadastro">Localização</h1>

    <p>
        <a class="botao-voltar" href="perfil-logado.php">Voltar</a>
    </p>

    <form action="#" method="post" class="form-cadastro">
        <input type="hidden" name="tatuadoresId" value="1">
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