<?php
// Namespace e requires
use Inkwizards\{Usuario};
require_once "../inc/cabecalho-admin.php";
$sessao->verificaAcessoAdmin();

// Objeto do usuario e verificação de acesso
$usuario = new Usuario;

// Guardando metodo de exibição numa variavel
$dadosUsuario = $usuario->exibir();

?>
    <h1 class="text-center m-3">Usuarios - <?=count($dadosUsuario)?></h1>
    
    <!-- Tabela com os dados dos usuarios -->
    <div class="container">
        <p>
            <a class="btn btn-danger" href="">Voltar</a>
        </p>
        <p class="text-center"><a class="btn btn-danger" href="usuario-inserir.php">Inserir usuário</a></p>
        <table class="table table-dark table-striped table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Tipo</th>
                    <th class="text-center">Operações</th>
                </tr>
            </thead>

            <tbody class="table-group-divider">
                <?php foreach($dadosUsuario as $umUsuario) {?>
                <tr>
                    <td><?=$umUsuario['nome']?></td>
                    <td><?=$umUsuario['email']?></td>
                    <td><?=$umUsuario['tipo']?></td>
                    <td class="text-center">
                        <a class="btn btn-warning" href="usuario-atualizar.php?id=<?=$umUsuario['id']?>">Atualizar</a>
                        <a class="btn btn-danger excluir" href="usuario-excluir.php?id=<?=$umUsuario['id']?>">Excluir</a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>

<?php 
require_once "../inc/rodape.php";
?>