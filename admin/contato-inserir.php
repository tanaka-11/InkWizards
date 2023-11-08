<?php
    use Inkwizards\{Contato};

    require "../inc/cabecalho-admin.php";

    $contato = new Contato;
    
    if(isset($_POST['inserir'])) {
        $contato->setCelular($_POST['celular']);
        $contato->setTelefone($_POST['telefone']);
        $contato->usuario->setId($_SESSION['id']);

        $contato->inserir();
        
        header('location:meu-perfil.php');
    }    
?>
    <h1 class="text-center">Contato</h1>
    <p class="m-3"><a class="btn btn-primary" href="meu-perfil.php">Voltar</a></p>
    <form action="#" method="post" class="container">
        <div class="form-floating m-3">
            <input class="form-control" type="tel" name="celular" id="celular" placeholder="" required>
            <label for="celular">Celular:</label>
        </div>
        <div class="form-floating m-3">
            <input class="form-control" type="tel" name="telefone" id="telefone" placeholder="">
            <label for="telefone">Telefone:</label>
        </div>
        <div class="m-3">
            <button class="btn btn-primary" type="submit" name="inserir">Adicionar</button>
        </div>
    </form>
<?php require "../inc/rodape.php"; ?>