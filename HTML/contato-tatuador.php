<?php 
    require "./includes/cabecalho.php";
    require_once "./src/funcoes.php";

    if(isset($_POST['add-att'])) {
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
        $celular = filter_input(INPUT_POST, "celular", FILTER_SANITIZE_NUMBER_INT);
        $telefone = filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_NUMBER_INT);
        $tatuadoresId = filter_input(INPUT_POST, "tatuadoresId", FILTER_SANITIZE_NUMBER_INT);

        inserirContato($conexao, $email, $telefone, $celular, $tatuadoresId);
    }
?>
    <h1 class="titulo-cadastro">Contato</h1>
    <p><a class="botao-voltar" href="perfil-logado.php">Voltar</a></p>
    <form action="#" method="post" class="form-cadastro">
        <input type="hidden" name="tatuadoresId" value="1">
        <div>
            <input type="text" name="email" id="email" placeholder="E-mail" required>
        </div>
        <section class="form-celular-telefone">
            <div>
                <input type="number" name="celular" id="celular" placeholder="Celular" required>
            </div>
            <div>
                <input type="number" name="telefone" id="telefone" placeholder="Telefone">
            </div>
        </section>
        <div>
            <button type="submit" name="add-att">Adicionar</button>
        </div>
    </form>
<?php require "./includes/rodape.php"; ?>