<?php
use Inkwizards\{Usuario, ControleDeAcesso};
require_once "inc/cabecalho.php";

// Mensagens de feedback
if(isset($_GET['campos_obrigatorios'])) {
    $feedback = "Preencha e-mail e senha";
} elseif (isset($_GET['dados_incorretos'])) {
    $feedback = "Preencha novamente";
} elseif (isset($_GET['logout'])) {
    $feedback = "Você saiu do sistema";
} elseif (isset($_GET['acesso_proibido'])) {
    $feedback = "Faça o Login";
}
?>
    <h1 class="text-center">Login</h1>

    <form action="#" method="post" class="container">
        <?php if(isset($feedback)) {?>
            <p class="alert alert warning text center"><?=$feedback?></p>
        <?php } ?>

        <div class="form-floating m-3">
            <input class="form-control" type="email" id="email" name="email" placeholder="">
            <label for="email">E-mail</label>
        </div>

        <div class="form-floating m-3">
            <input class="form-control" type="password" id="senha" name="senha" placeholder="">
            <label for="senha">Senha</label>
        </div>

        <div class="m-3">
            <button class="btn btn-primary" name="entrar" type="submit">Entrar</button>
        </div>
    </form>

    <!-- Script da verificação de dados -->
    <?php
        if(isset($_POST['entrar'])){
            if (empty($_POST['email']) || empty($_POST['senha'])) {
                header('location:login.php?campos_obrigatorios');
            } else {
                $usuario = new Usuario;
                $usuario->setEmail($_POST['email']);
                $dados = $usuario->buscar();

                if(!$dados){
                    header('location:login.php?dados_incorretos');
                } else {
                    if(password_verify($_POST['senha'], $dados['senha'])) {
                        $sessao = new ControleDeAcesso;
                        $sessao->login($dados['id'], $dados['nome'], $dados['tipo']);
                        header('location:index.php');
                    } else {
                        header('location:login.php?dados_incorretos');
                    }
                }
            }
        }
    ?>