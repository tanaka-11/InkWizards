<?php
use Inkwizards\Tatuador;
require "../includes/cabecalho-admin.php";

$tatuador = new Tatuador;
$tatuador->setId($_GET['id']);
$dadosTatuador = $tatuador->exibirUm();
?>
    <section class="dados-perfil">
        <!-- AQUI SERÁ UMA TAG IMG (eu acho) -->
        <div id="foto-de-perfil"><a href="atualizar-perfil.php">E</a></div>
        
        <h1 class="nome-perfil"><?=$dadosTatuador['nome']?> <a href="atualizar-perfil.php">E</a></h1>
        <p><?=$dadosTatuador['email']?> <a href="atualizar-perfil.php">E</a></p>
        <p>Senha (***) <a href="atualizar-perfil.php">E</a></p>
        <p><?=$dadosTatuador['descricao']?> <a href="atualizar-perfil.php">E</a></p>
        <p><a href="localizacao.php">Adicionar/Editar localização</a></p>
        <p><a href="contato-tatuador.php">Adicionar/Editar contato</a></p>
        <p><a href="adicionar-portifolio">Adicionar portifolio</a></p>
        
    </section>

    
<?php require "../includes/rodape.php" ?>