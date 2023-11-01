<?php
use Inkwizards\{Portfolio};
require_once "../inc/cabecalho-admin.php";

$portfolio = new Portfolio;

$dadosPortfolio = $portfolio->exibir();
?>

    <h1>Estilos</h1>
    <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Imagem</th>
                    <th>Descrição</th>
                    <th class="text-center">Operações</th>
                </tr>
            </thead>

    <tbody class="table-group-divider">
    <?php foreach($dadosPortfolio as $umPortfolio) {?>
                <tr>
                    <td><?=$umPortfolio['nome']?></td>
                    <td><?=$umPortfolio['imagem']?></td>
                    <td><?=$umPortfolio['descricao']?></td>
    
                    <td class="text-center">
                        <a class="btn btn-warning" href="usuario-atualizar.php?id=<?=$umPortfolio['id']?>">Atualizar</a>
                        <a class="btn btn-danger" href="usuario-excluir.php?id=<?=$umPortfolio['id']?>">Excluir</a>
                    </td>
                </tr>
    <?php }?>
    </table>
