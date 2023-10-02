<?php require "./includes/cabecalho.php"; ?>
    <h1 class="titulo-cadastro">Contato</h1>
    <p><a class="botao-voltar" href="perfil-logado.php">Voltar</a></p>
    <form action="#" method="post" class="form-cadastro">
        <div>
            <input type="text" name="email" id="email" placeholder="E-mail" required>
        </div>
        <section class="form-celular-telefone">
            <div>
                <input type="number" name="celuar" id="celular" placeholder="Celular" required>
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