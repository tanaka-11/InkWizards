<?php
use Inkwizards\{Usuario, ControleDeAcesso};
require_once "inc/cabecalho.php";

$usuario = new Usuario;
$sessao = new ControleDeAcesso;

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

    <h1>Login</h1>

    <form action="#" method="post">
    <?php if(isset($feedback)) {?>
        <p><?=$feedback?></p>
    <?php } ?>

        <div>
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email">
        </div>

        <div>
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha">
        </div>

        <button name="entrar" type="submit">Entrar</button>
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