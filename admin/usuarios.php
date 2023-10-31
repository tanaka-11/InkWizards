<?php
// Namespace e requires
use Inkwizards\{Usuario};
require_once "../inc/cabecalho-admin.php";

// Objeto do usuario e verificação de acesso
$usuario = new Usuario;

// Guardando metodo de exibição numa variavel
$dadosUsuario = $usuario->exibir();

?>
    <h1>Usuarios - <?=count($dadosUsuario)?></h1>
    <p>
        <a href="">Voltar</a>
    </p>

    <!-- Tabela com os dados dos usuarios -->
    <div>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Tipo</th>
                    <th>Operações</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($dadosUsuario as $umUsuario) {?>
                <tr>
                    <td><?=$umUsuario['nome']?></td>
                    <td><?=$umUsuario['email']?></td>
                    <td><?=$umUsuario['tipo']?></td>
                    <td>
                        <a href="">Atualizar</a>
                        <a href="">Excluir</a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>

<?php 
require_once "../inc/rodape.php";
?>