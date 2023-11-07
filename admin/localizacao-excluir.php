<?php

use Inkwizards\{ControleDeAcesso, Localizacao};

require_once "../vendor/autoload.php";

$sessao = new ControleDeAcesso;
$sessao->verificaAcesso();

$localizacao = new Localizacao;
$localizacao->setId($_GET['id']);
$localizacao->excluir();

header("location:meu-perfil.php");