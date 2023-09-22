<?php require "includes/cabecalho.php" ?>
    <h1 id="titulo-cadastro">Cadastro</h1>
    <form action="#" method="post" class="form-cadastro">
        <div>
            <input type="file" name="foto-perfil" id="foto-perfil">
        </div>
        <div>
            <input type="text" name="nome" id="nome" placeholder="Nome:">
        </div>
        <div>
            <input type="text" name="email" id="email" placeholder="E-mail:">
        </div>
        <div>
            <input type="password" name="senha" id="senha-antiga" placeholder="Senha antiga:">
        </div>
        <div>
            <input type="password" name="senha-confirma" id="senha-nova" placeholder="Senha nova:">
        </div>
        <div>
            <input type="password" name="senha-confirma" id="senha-nova-confirma" placeholder="Confirme sua nova senha:">
        </div>
        <div>
            <textarea name="descricao" id="descricao" cols="30" rows="10" placeholder="Sobre você:"></textarea>
        </div>
        <div>
            <button type="submit" name="atualizar">Atualizar</button>
        </div>
    </form>
<?php require "includes/rodape.php" ?>