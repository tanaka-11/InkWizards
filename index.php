<?php
use Inkwizards\{Estilo, Usuario};
require_once 'inc/cabecalho.php';

$usuario = new Usuario;
$estilo = new Estilo;


$dadosUsuario = $usuario->exibir();
$dadosEstilo = $estilo->exibir();

?>
    <section class="usuarios">
    <h1 class="text-center">Nossos artistas</h1>
    <div class="d-flex justify-content-center container text-center">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
        <?php foreach($dadosUsuario as $umUsuario){ ?>
            <?php if($umUsuario['tipo'] === 'tatuador') {?>
            <div class="col">    
                <div class="card text-center m-3 text-bg-dark">
                    <p>
                        <img src="assets/images/perfil/<?=$umUsuario['foto_perfil']?>" class="card-img-top foto-perfil m-4" alt="foto perfil">
                        <br>
                        <a class="btn btn-outline-danger m-4" href="#">Veja as artes deste artista</a>
                    </p>
                </div>
            </div>    
            <?php }?>
        <?php } ?>
        </div>
    </div>        
    </section>
    
    <section class="estilos">
    <h1 class="text-center">Estilos</h1>
    <div class="d-flex justify-content-center container text-center">   
    <?php foreach($dadosEstilo as $umEstilo){?>
        <div class="card m-5 text-bg-dark" style="width: 12rem;">
            <div class="card-body">
                <h3 style="color: #CA012E;" class="card-text"><?=$umEstilo['nome']?></h3>
            </div>
        </div>
            
    <?php } ?>
    </section>

    <section class="contatos">
        <h1 class="text-center">Contato</h1>
        <div class="contato text-center">
            <p>
            Entre em contato conosco no email InkWizards@gmail.com
            </p>

        <div class="botao-contato">
            <p>
                <a href="contato.php">Contato</a>
            </p>
        </div>
        
        </div>
    </section>    
    
    <section class="cadastro">

    <h1 class="text-center">Cadastro/Login</h1>

        <div class="cadastro-login">
            <p  class="botao-cadastro">
                <a href="./cadastro.php">Cadastro</a>
            </p>
        
            <p class="botao-login">
                <a href="">Login</a>
            </p>
        </div>
            
    </section>


<?php require_once "inc/rodape.php" ?>