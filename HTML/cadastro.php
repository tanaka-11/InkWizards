<?php require "includes/cabecalho.php";

if(isset ($_POST['cadastrar'])) {
    require_once "../HTML/src/funcoes.php";

    // $dadosDoTatuador = verTatuadores($conexao);

    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);

    
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
    
    $descricao = filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_SPECIAL_CHARS);

    $localizacao_id = filter_input(INPUT_POST, "localizacao_id", FILTER_SANITIZE_SPECIAL_CHARS);

    // $cep = filter_input(INPUT_POST, "cep", FILTER_SANITIZE_NUMBER_INT);

    // $logradouro = filter_input(INPUT_POST, "logradouro", FILTER_SANITIZE_SPECIAL_CHARS);

    // $numero = filter_input(INPUT_POST, "numero", FILTER_SANITIZE_NUMBER_INT);

    // $bairro = filter_input(INPUT_POST, "bairro", FILTER_SANITIZE_SPECIAL_CHARS);

    $complemento = filter_input(INPUT_POST, "complemento", FILTER_SANITIZE_SPECIAL_CHARS);
    
    $cadastro = inserirTatuador($conexao, $nome, $email, $senha, $descricao, $localizacao_id);
    
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

        <div>
            <input type="password" name="senha-confirma" id="senha-confirma" placeholder="Confirme sua senha:" required>
        </div>

        <div>
            <textarea name="descricao" id="descricao" cols="30" rows="10" placeholder="Sobre você:"></textarea>
        </div>
        
        <div>
            <input type="number" name="cep" id="cep" placeholder="CEP" required>
        </div>

        <section class="form-rua-numero">
            <div class="div-rua">
                <input type="text" name="logradouro" id="logradouro" placeholder="Logradouro" required>
            </div>

            <div class="div-numero-casa">
                <input type="number" name="numero" id="numero" placeholder="Número" required>
            </div>
        </section>

        <section class="form-bairro-complemento">
            <div>
                <input type="text" name="bairro" id="bairro" placeholder="Bairro" required>
            </div>

            <div>
                <input type="text" name="complemento" id="complemento" placeholder="Complemento" required>
            </div>
        </section>

        <div>
            <button type="submit" name="cadastrar">Cadastrar</button>
        </div>
    </form>
    <?php require "includes/rodape.php" ?>