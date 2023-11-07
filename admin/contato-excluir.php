<?php

use Inkwizards\{ControleDeAcesso, Contato};

require_once "../vendor/autoload.php";

$sessao = new ControleDeAcesso;
$sessao->verificaAcesso();

$contato = new Contato;
$contato->setId($_GET['id']);
$contato->excluir();

header("location:meu-perfil.php");