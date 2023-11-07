<?php

use Inkwizards\{ControleDeAcesso, Estilo};

require_once "../vendor/autoload.php";

$sessao = new ControleDeAcesso;
$sessao->verificaAcesso();
$sessao->verificaAcessoAdmin();

$estilo = new Estilo;
$estilo->setId($_GET['id']);
$estilo->excluir();

header("location:estilos.php");