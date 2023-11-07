<?php

use Inkwizards\Usuario;

    require "../inc/cabecalho-admin.php";

    $usuario = new Usuario;
    $usuario->setId($_SESSION['id']);
    $dados = $usuario->exibirUm();

    
?>
    <section class="container">
        <h1 class="text-center m-3">Atualizar Dados</h1>
        <p><a class="btn btn-primary" href="perfil-logado.php">Voltar</a></p>
        <form action="#" method="post">
            <div class="form-floating m-3">
                <input class="form-control" type="file" name="foto-perfil" id="foto-perfil">
            </div>
            <div class="form-floating m-3">
                <input value="<?=$dados['nome']?>" class="form-control" type="text" name="nome" id="nome" placeholder="">
                <label for="nome">Nome:</label>
            </div>
            <div class="form-floating m-3">
                <input value="<?=$dados['email']?>" class="form-control" type="text" name="email" id="email" placeholder="">
                <label for="email">E-mail:</label>
            </div>
            <div class="form-floating m-3">
                <input class="form-control" type="password" name="senha" id="senha" placeholder="">
                <label for="senha">Senha:</label>
            </div>
            <div class="form-floating m-3">
                <textarea class="form-control" name="descricao" id="descricao" style="resize: none;" cols="30" rows="10" placeholder=""><?=$dados['descricao']?></textarea>
                <label for="descricao">Descrição</label>
            </div>
            <div class="m-3">
                <button class="btn btn-primary" type="submit" name="atualizar">Atualizar</button>
            </div>
        </form>
    </section>
<?php require "../inc/rodape.php" ?>