<?php

use Inkwizards\Estilo;

    require_once "../inc/cabecalho-admin.php";
    $sessao->verificaAcessoAdmin();
    $estilo = new Estilo;
    $estilos = $estilo->exibir();
?>
<section class="container">
    <h1 class="text-center">Estilos</h1>
    <p><a class="btn btn-primary" href="estilos-inserir.php">Inserir estilo</a></p>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Nome</th>
                <th class="text-center">Operações</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach($estilos as $dadosEstilo){ ?>
                <tr>
                    <td><?=$dadosEstilo['nome']?></td>
                    <td class="text-center">
                        <a class="btn btn-warning" href="estilos-atualizar.php?id=<?=$dadosEstilo['id']?>">Atualizar</a>
                        <a class="btn btn-danger" href="estilos-excluir.php?id=<?=$dadosEstilo['id']?>">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</section>
