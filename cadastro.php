<?php 
// Require do Header e Funções
use Inkwizards\{Usuario};
require_once "inc/cabecalho.php";

// Criação do objeto
$usuario = new Usuario;

if(isset ($_POST['cadastrar'])) {


    $usuario->setNome($_POST['nome']);
    
    $usuario->setDescricao($_POST['descricao']);

    $usuario->setEmail($_POST['email']);
    
    $usuario->setSenha($usuario->codificaSenha($_POST['senha']));

    $usuario->setTipo($_POST['tipo']);

    $imagem = $_FILES['foto-perfil'];

    $usuario->upload($imagem, $pagina);

    $usuario->setFotoPerfil($imagem['name']);
    
    $usuario->cadastrar();

    header("location:index.php");
}  
?>
  
    <h1 class="text-center">Cadastro</h1>

    <form action="#" method="post" class="container" enctype="multipart/form-data">
        <div class="form-floating m-3">
            <input class="form-control" type="file" name="foto-perfil" id="foto-perfil" placeholder="" accept="image/png, image/jpeg, image/gif, image/svg+xml">
            <label for="foto-perfil">Foto de Perfil:</label>
        </div>

        <div class="form-floating m-3">
            <input class="form-control" type="text" name="nome" id="nome" placeholder="" required>
            <label for="nome">Nome:</label>
        </div>

        <div class="form-floating m-3">
            <input class="form-control" type="email" name="email" id="email" placeholder="" required>
            <label for="email">E-mail:</label>
        </div>

        <div class="form-floating m-3">
            <input class="form-control" type="password" name="senha" id="senha" placeholder="" required>
            <label for="senha">Crie sua senha:</label>
        </div>

        <!-- <div>
            <input type="password" name="senha-confirma" id="senha-confirma" placeholder="Confirme sua senha:" required>
        </div> -->
        <div class="form-floating m-3">
            <select class="form-select" name="tipo" id="tipo">
                <option value="" disabled selected>Escolha um tipo</option>
                <option value="tatuador">Tatuador</option>
                <option value="cliente">Cliente</option>
            </select>
            <label for="tipo">Tipo de usuário:</label>
        </div>

        <div class="form-floating m-3">
            <textarea class="form-control" style="resize: none;" name="descricao" id="descricao" cols="50" rows="10" placeholder=""></textarea>
            <label for="descricao">Sobre você:</label>
        </div>

        <div class="m-3">
            <button class="btn btn-primary" type="submit" name="cadastrar">Cadastrar</button>
        </div>
    </form>

    <?php require "inc/rodape.php"; ?>