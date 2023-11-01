<?php
use Inkwizards\{Portfolio};
require_once "../inc/cabecalho-admin.php";

$portfolio = new Portfolio;

$dadosPortfolio = $portfolio->exibir();

if(isset($_POST['inserir'])){
    // $portfolio->setImagem($_)
}