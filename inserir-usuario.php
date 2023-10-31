<?php 
// Require do Header e Funções
use Inkwizards\{Usuario};
require_once "includes/cabecalho.php";

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

    // header("location:/index.php");
}  
?>
  
    <h1 class="titulo-cadastro">Cadastro</h1>

    <form action="#" method="post" class="form-cadastro">
        <div>
            <input type="text" name="foto-perfil" id="foto-perfil" placeholder="Foto:">
        </div>

        <div>
            <input type="text" name="nome" id="nome" placeholder="Nome:" required>
        </div>

        <div>
            <input type="email" name="email" id="email" placeholder="E-mail:" required>
        </div>

        <div>
            <input type="password" name="senha" id="senha" placeholder="Crie sua senha:" required>
        </div>

        <!-- <div>
            <input type="password" name="senha-confirma" id="senha-confirma" placeholder="Confirme sua senha:" required>
        </div> -->
        <div>
            <select name="tipo" id="tipo">
                <option value="" disabled selected>Selecione um tipo</option>
                <option value="tatuador">Tatuador</option>
                <option value="cliente">Cliente</option>
            </select>
        </div>

        <div>
            <textarea name="descricao" id="descricao" cols="30" rows="10" placeholder="Sobre você:"></textarea>
        </div>

        <div>
            <button type="submit" name="cadastrar">Cadastrar</button>
        </div>
    </form>

    <?php require "includes/rodape.php"; ?>