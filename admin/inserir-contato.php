<?php
    use Inkwizards\{Contato};

    require "../includes/cabecalho-admin.php";

    $contato = new Contato;
    
    if(isset($_POST['inserir'])) {
        $contato->setCelular($_POST['celular']);
        $contato->setTelefone($_POST['telefone']);
        $contato->setUsuarioId($_POST['usuarioId']);

        $contato->inserir();
    }    
?>
    <h1 class="titulo-cadastro">Contato</h1>
    <p><a class="botao-voltar" href="perfil-logado.php">Voltar</a></p>
    <form action="#" method="post" class="form-cadastro">
        <section class="form-celular-telefone">
            <input type="hidden" name="usuarioId" value="1">
            <div>
                <input type="number" name="celular" id="celular" placeholder="Celular" required>
            </div>
            <div>
                <input type="number" name="telefone" id="telefone" placeholder="Telefone">
            </div>
        </section>
        <div>
            <button type="submit" name="inserir">Adicionar</button>
        </div>
    </form>
<?php require "../includes/rodape.php"; ?>