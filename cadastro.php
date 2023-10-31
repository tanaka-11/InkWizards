<?php 
// Require do Header e Funções
use Inkwizards\{Usuario};
require_once "inc/cabecalho.php";

// Criação do objeto
$usuario = new Usuario;

$dadosUsuarios = $usuario->exibir();

if(isset ($_POST['cadastrar'])) {

    $usuario->setFotoPerfil($_POST['foto-perfil']);

    $usuario->setNome($_POST['nome']);
    
    $usuario->setDescricao($_POST['descricao']);

    $usuario->setEmail($_POST['email']);
    
    $usuario->setSenha($_POST['senha']);

    $usuario->setTipo($_POST['tipo']);
    
    $usuario->cadastrar();

    header("location:/index.php");
}  
?>
  
    <h1 class="text-center">Cadastro</h1>

    <form action="#" method="post" class="container">
        <div class="form-floating m-3">
            <input class="form-control" type="file" name="foto-perfil" id="foto-perfil" placeholder="">
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