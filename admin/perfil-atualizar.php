<?php
    require "../inc/cabecalho-admin.php"
    
?>
    <section class="container">
        <h1 class="text-center">Atualizar Dados</h1>
        <p><a class="btn btn-primary" href="perfil-logado.php">Voltar</a></p>
        <form action="#" method="post">
            <div class="form-floating m-3">
                <input type="file" name="foto-perfil" id="foto-perfil">
            </div>
            <div class="form-floating m-3">
                <input type="text" name="nome" id="nome" placeholder="">
            </div>
            <div class="form-floating m-3">
                <input type="text" name="email" id="email" placeholder="E-mail:">
            </div>
            <div class="form-floating m-3">
                <input type="password" name="senha" id="senha-antiga" placeholder="Senha antiga:">
            </div>
            <div class="form-floating m-3">
                <input type="password" name="senha-confirma" id="senha-nova" placeholder="Senha nova:">
            </div>
            <div class="form-floating m-3">
                <input type="password" name="senha-confirma" id="senha-nova-confirma" placeholder="Confirme sua nova senha:">
            </div>
            <div class="form-floating m-3">
                <textarea name="descricao" id="descricao" cols="30" rows="10" placeholder="Sobre você:"></textarea>
            </div>
            <div>
                <button type="submit" name="atualizar">Atualizar</button>
            </div>
        </form>
    </section>
<?php require "../inc/rodape.php" ?>