<?php

use Inkwizards\Usuario;

    require "../inc/cabecalho-admin.php";

    $usuario = new Usuario;
    $usuario->setId($_SESSION['id']);
    $dados = $usuario->exibirUm();

    if(isset($_POST['atualizar'])){
        if(empty($_FILES['foto-perfil']['name'])) {
            $usuario->setFotoPerfil($_POST['foto-perfil-atual']);
        } else {
            $usuario->upload($_FILES['foto-perfil'], $pagina);
            $usuario->setFotoPerfil($_FILES['foto-perfil']['name']);
        }

        $usuario->setNome($_POST['nome']);
        $usuario->setEmail($_POST['email']);

        if(empty($_POST['senha'])) {
            $usuario->setSenha($dados['senha']);
        } else {
            $usuario->setSenha($usuario->verificaSenha($_POST['senha'], $dados['senha']));
        }

        $usuario->setDescricao($_POST['descricao']);
        $usuario->setTipo($_POST['tipo']);

        $usuario->atualizar();
        header("location:meu-perfil.php");
    }

    
?>
    <section class="container">
        <h1 class="text-center m-3">Atualizar Dados</h1>
        <p><a class="btn btn-primary" href="meu-perfil.php">Voltar</a></p>
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="form-floating m-3">
                <input class="form-control" value="<?=$dados['foto_perfil']?>" type="text" name="foto-perfil-atual" id="foto-perfil-atual" readonly>
                <label for="foto-perfil-atual">Foto de perfil atual:</label>
            </div>
            <div class="form-floating m-3">
                <input class="form-control" type="file" name="foto-perfil" id="foto-perfil" accept="image/png, image/jpeg, image/gif, image/svg+xml">
                <label for="foto-perfil">Selecionar outra foto, caso queira trocar</label>
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
                <select class="form-select" name="tipo" id="tipo">
                    <option value="" disabled>Escolha um tipo</option>
                    <option <?php if($dados['tipo'] === "tatuador") echo "selected" ?> value="tatuador">Tatuador</option>
                    <option <?php if($dados['tipo'] === "cliente") echo "selected" ?> value="cliente">Cliente</option>
                    <?php if($_SESSION['tipo'] === "admin") { ?>
                        <option <?php if($dados['tipo'] === "admin") echo "selected" ?> value="admin">Administrador</option>
                    <?php } ?>
                </select>
                <label for="tipo">Tipo de usuário:</label>
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