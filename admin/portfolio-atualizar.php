<?php
use Inkwizards\{Portfolio};
require_once "../inc/cabecalho-admin.php";

$portfolio = new Portfolio;

?>

<section class="container">
    <h1 class="text-center">Atualizar portfolio</h1>
    <form action="#" method="post">
        <div class="form-floating m-3">
            <input class="form-control" type="file" name="imagemPortfolio" id="imagemPortfolio">
        </div>
    </form>
</section>