<?php
use Inkwizards\{Contato};
require_once "../inc/cabecalho-admin.php";

$contato = new Contato;
$contato->usuario->setId($_SESSION['id']);
$contato->setId($_GET['id']);

$dadosContato = $contato->exibirUm();
if(isset($_POST['atualizar'])){
    $contato->setTelefone($_POST['telefone']);
    $contato->setCelular($_POST['celular']);
    $contato->atualizar();
    header('location:meu-perfil.php');
}
?>

<h1 class="text-center m-3">Atualizar contato</h1>
<form action="#" method="post" class="container">
        <p class="m-3"><a class="btn btn-danger" href="meu-perfil.php">Voltar</a></p>
        <div class="form-floating m-3">
            <input value="<?=$dadosContato['celular']?>" class="form-control" type="number" name="celular" id="celular" placeholder="" required>
            <label for="celular">Celular:</label>
        </div>
        <div class="form-floating m-3">
            <input value="<?=$dadosContato['telefone']?>" class="form-control" type="number" name="telefone" id="telefone" placeholder="">
            <label for="telefone">Telefone:</label>
        </div>
        <div class="m-3">
            <button class="btn btn-danger" type="submit" name="atualizar">Atualizar</button>
        </div>
    </form>
<?php require "../inc/rodape.php"; ?>