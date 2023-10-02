<?php require "./includes/cabecalho.php"; ?>
    <h1 class="titulo-cadastro">Localização</h1>
    <p><a class="botao-voltar" href="perfil-logado.php">Voltar</a></p>
    <form action="#" method="post" class="form-cadastro">
        <div>
            <input type="number" name="cep" id="cep" placeholder="CEP" required>
        </div>
        <section class="form-rua-numero">
            <div class="div-rua">
                <input type="text" name="logradouro" id="logradouro" placeholder="Logradouro" required>
            </div>
            <div class="div-numero-casa">
                <input type="number" name="numero-casa" id="numero-casa" placeholder="Número" required>
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