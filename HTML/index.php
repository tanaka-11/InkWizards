<?php require_once "./includes/cabecalho.php"; 
require_once "./src/funcoes.php";

// $teste = verTatuadores($conexao);
?>
    
    <pre> <?=var_dump($teste)?> </pre>

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
                <a href="#">Contato</a>
            </p>
        </div>
        
        </div>
    </section>    
    
    <section class="cadastro">

    <h1 class="text-center">Cadastro/Login</h1>

        <div class="cadastro-login">
            <p  class="botao-cadastro">
                <a href="">Cadastro</a>
            </p>
        
            <p class="botao-login">
                <a href="">Login</a>
            </p>
        </div>
            
    </section>


<?php require_once "./includes/rodape.php" ?>