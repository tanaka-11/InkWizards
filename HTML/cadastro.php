<?php 
// Require do Header e Funções
use Inkwizards\Tatuador;
require_once '../vendor/autoload.php';
require_once "includes/cabecalho.php";

// Criação do objeto
$tatuador =  new Tatuador;

$dadosDosTatuadores = $tatuador->exibir();

if(isset ($_POST['cadastrar'])) {

    $tatuador->setNome($_POST['nome']);
    
    $tatuador->setDescricao($_POST['descricao']);

    $tatuador->setEmail($_POST['email']);
    
    $tatuador->setSenha($_POST['senha']);
    
    $tatuador->cadastrar();

    // header("location:/index.php");
}  
?>
  
    <h1 class="titulo-cadastro">Cadastro</h1>

    <form action="#" method="post" class="form-cadastro">
        <div>
            <input type="file" name="foto-perfil" id="foto-perfil">
        </div>

        <div>
            <input type="text" name="nome" id="nome" placeholder="Nome:" required>
        </div>

        <div>
            <input type="text" name="email" id="email" placeholder="E-mail:" required>
        </div>

        <div>
            <input type="password" name="senha" id="senha" placeholder="Crie sua senha:" required>
        </div>

        <!-- <div>
            <input type="password" name="senha-confirma" id="senha-confirma" placeholder="Confirme sua senha:" required>
        </div> -->

        <div>
            <textarea name="descricao" id="descricao" cols="30" rows="10" placeholder="Sobre você:"></textarea>
        </div>

        <div>
            <button type="submit" name="cadastrar">Cadastrar</button>
        </div>
    </form>

    <?php require "includes/rodape.php"; ?>