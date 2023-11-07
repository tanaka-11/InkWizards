<?php
use Inkwizards\{Usuario, Localizacao, Contato, Portfolio};
require "../inc/cabecalho-admin.php";

$usuario = new Usuario;
$usuario->setId($_SESSION['id']);

$localizacao = new Localizacao;
$localizacao->usuario->setId($_SESSION['id']);
$dadosLocalizacao = $localizacao->exibirUm();

$contato = new Contato;
$contato->usuario->setId($_SESSION['id']);
$dadosContato = $contato->exibirUm();

$portfolio = new Portfolio;
$portfolio->usuario->setId($_SESSION['id']);
$portfolio->usuario->setTipo($_SESSION['tipo']);
$dadosPortfolio = $portfolio->exibirUsuario();
$dadosEstilos = $portfolio->estilo->exibir();

$dadosUsuario = $usuario->exibirUm();
?>
<section class="container">

<div class="card text-bg-dark text-center m-3 p-3" style="width: 100%;">
    <div id="foto-de-perfil">
        <img src="../assets/images/perfil/<?=$dadosUsuario['foto_perfil']?>" class="card-img-top" alt="Foto de perfil">
    </div>

  <div class="card-body">
    <h3 class="card-title"> <?=$dadosUsuario['nome']?> </h5>
    <p class="card-text"><?=$dadosUsuario['descricao']?></p>
  </div>

  <ul class="list-group list-group-flush">
    <li class="list-group-item text-bg-dark"><?=$dadosUsuario['email']?></li>
  </ul>
  
  <?php if(empty($dadosLocalizacao)) { ?>
            <p><a class="btn btn-outline-primary" href="localizacao-inserir.php">Adicionar localização</a></p>
        <?php } else { ?>
            <p><?=$dadosLocalizacao['endereco']?> <br>
                <a class="btn btn-outline-primary" href="localizacao-atualizar.php?id=<?=$dadosLocalizacao['id']?>">Editar</a> 
                <a class="btn btn-outline-danger" href="localizacao-excluir.php?id=<?=$dadosLocalizacao['id']?>">Excluir</a>
            </p>
        <?php } ?>

        <?php if(empty($dadosContato)) { ?>
            <p>
                <a class="btn btn-outline-primary" href="contato-inserir.php">Adicionar contato</a>
            </p>
        <?php } else { ?>
            <p><?=$dadosContato['celular']?>  <br>
            <a class="btn btn-outline-primary" href="contato-atualizar.php?id=<?=$dadosContato['id']?>">Editar</a> 
            <a class="btn btn-outline-danger" href="contato-excluir.php?id=<?=$dadosContato['id']?>">Excluir</a></p>
        <?php } ?>

    <div class="card-body">
        <a class="btn btn-outline-danger" href="perfil-atualizar.php">Editar Dados de Perfil</a>
    </div>       
</div>

<div class="text-center">           
    <?php if($_SESSION['tipo'] === 'tatuador') {?>
        <p>
            <a class="btn btn-outline-primary m-3 text-center " href="portfolio-inserir.php">Adicionar portfolio</a>
        </p>
</div>         
    
    <?php foreach($dadosPortfolio as $umPortfolio){ ?>
                <div class="card m-3">
                    <div class="card-header">
                        <p><?=$umPortfolio['descricao']?></p>
                    </div>
                    <div class="card-body">
                        <p><?=$dadosEstilos[$umPortfolio['estilo_id'] - 1]['nome']?></p>
                        <p>
                            <a class="btn btn-warning" href="portfolio-atualizar.php?id=<?=$umPortfolio['id']?>">Atualizar</a>
                        </p>
                        <p>
                            <a class="btn btn-danger" href="portfolio-excluir.php?id=<?=$umPortfolio['id']?>">Excluir</a>
                        </p>
                        <img src="../assets/images/portfolio/<?=$umPortfolio['imagem']?>" alt="Foto tatuagem" class="card-img-bottom">
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
     
</section>

    
<?php require "../inc/rodape.php" ?>