<?php
namespace Inkwizards;
use PDO, Exception;

class Estilos {
    // Propriedades da classe
    private int $id;
    private string $nome;
    private int $portfolio_id;

    // Conexão
    private PDO $conexao;
    public function __construct(){
        $this->conexao = Banco::conecta();
    }
    
    // METODOS


    // Getters, Setters e Sanitização
    public function getId(): int
    {
        return $this->id;
    }

    
    public function setId(int $id): self {
        $this->id = $id;
        return $this;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function setNome(string $nome): self {
        $this->nome = $nome;
        return $this;
    }

   
    public function getPortfolioId(): int {
        return $this->portfolio_id;
    }

    public function setPortfolioId(int $portfolio_id): self {
        $this->portfolio_id = $portfolio_id;
        return $this;
    }
}