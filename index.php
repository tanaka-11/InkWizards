<?php
use Inkwizards\{Usuario};
require_once 'inc/cabecalho.php';
$tatuador = new Usuario;

$dadosDoTatuador = $tatuador->exibir();
?>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/images/perfil/dog.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/images/perfil/loira.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/images/perfil/menina.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <section class="destaque-artista-index">
        <h1 class="text-center">Artistas</h1>

        <div class="destaqueArtistas">
            <!-- <img src="" alt=""> -->
        </div>
        
        <div class="botao-saiba-mais-index">
            <p class="text-center">
                <a href="#">Ver Mais</a>
            </p>
        </div>
    </section>
    
    <section class="estilos">
        <h1 class="text-center">Estilos</h1>

        <div class="cardsEstilos text-center">
            <img src="./assets/estilos/teste.png" alt="">

            <img src="./assets/estilos/teste.png" alt="">

            <img src="./assets/estilos/teste.png" alt="">

            <img src="./assets/estilos/teste.png" alt="">

            <img src="./assets/estilos/teste.png" alt="">

            <img src="./assets/estilos/teste.png" alt="">
        </div>

        <div class="botao-saiba-mais-index">
            <p>
                <a href="#">Ver Mais</a>
            </p>
        </div>
        
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