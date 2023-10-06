<?php
namespace Inkwizards;
use PDO, Exception;

class Contato {
    // Propriedades da classe
    private int $id;
    private string $email;
    private int $telefone;
    private int $celular;
    private int $tatuadoresId;
}