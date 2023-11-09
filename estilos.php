<?php
use Inkwizards\{Estilo};
require_once 'inc/cabecalho.php';
$estilo = new Estilo;

$dadosEstilo = $estilo->exibir();
?>

<h1 class="text-center m-3">Estilos</h1>
<section class="container">
    <div class="row">
        <?php foreach($dadosEstilo as $umEstilo) { ?>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card m-3 text-center text-bg-dark">
                    <div class="card-body">
                        <h5 class="card-title"><?=$umEstilo['nome']?></h5>
                        <a href="estilo.php?id=<?=$umEstilo['id']?>" class="btn btn-outline-danger">Acesse todas tatuagens deste estilo</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>


<?php require_once 'inc/rodape.php'; ?>