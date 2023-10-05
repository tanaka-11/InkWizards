<?php 
// Require do Header e Funções
require_once "includes/cabecalho.php";

require_once "./src/funcoes.php";

$dadosDosTatuadores = verTatuadores($conexao);

if(isset ($_POST['cadastrar'])) {

    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    
    $descricao = filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_SPECIAL_CHARS);

    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
    
    inserirTatuador($conexao, $nome, $descricao, $email, $senha);

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