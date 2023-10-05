<?php
namespace Inkwizards;

use PDO, Exception;

class Tatuador {
    // Propriedades da classe
    private int $id;
    private string $nome;
    private string $descricao;
    private string $email;
    private string $senha;
    private int $localizacao_id;
}