<?php
use Inkwizards\{Estilo};
require_once 'inc/cabecalho.php';
$estilo = new Estilo;

$dadosEstilo = $estilo->exibir();
?>

    <h1 class="text-center m-3">Estilos</h1>
    <section class="d-flex justify-content-center container">
<?php foreach($dadosEstilo as $umEstilo) {?>    
    <div class="card w-75 m-3 text-center text-bg-dark">
        <div class="card-body">
            <h5 class="card-title"><?=$umEstilo['nome']?></h5>
            <a href="estilo.php?id=<?=$umEstilo['id']?>" class="btn btn-outline-danger">Acesse todas tatuagens deste estilo</a>
        </div>
    </div>
<?php } ?>        
    </section>

<?php require_once 'inc/rodape.php'; ?>