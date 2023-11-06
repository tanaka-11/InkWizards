<?php
// Requires e namespace
use Inkwizards\{Portfolio};
require_once "../inc/cabecalho-admin.php";

$portfolio = new Portfolio;
$portfolio->setId($_GET['id']);
$portfolio->usuario->setId($_SESSION['id']);
// $portfolio->estilo->setId();
$portfolio->excluir();

header('location:portfolios.php');
