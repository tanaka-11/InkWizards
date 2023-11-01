<?php

use Inkwizards\Estilo;

    require_once "../inc/cabecalho-admin.php";

    if(isset($_POST['inserir'])) {
        $estilo = new Estilo;
        $estilo->setNome($_POST['nome']);
        $estilo->inserir();
        header("location:estilos.php");
    }
?>
<div class="container">
    <h1 class="text-center">Inserir estilo</h1>
    <form action="#" method="post">
        <div class="form-floating m-3">
            <input class="form-control" type="text" name="nome" id="nome" placeholder="">
            <label for="nome">Nome:</label>
        </div>
        <div class="m-3">
            <button class="btn btn-primary" type="submit" name="inserir">Inserir</button>
        </div>
    </form>
</div>