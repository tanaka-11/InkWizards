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
    public function inserir():void {
        $sql = "INSERT INTO estilos(nome, portifolio_id) VALUES(:nome, :portifolio_id)";

        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindValue(":nome", $this->nome, PDO::PARAM_STR);
            $consulta->bindValue(":portifolio_id", $this->portfolio_id, PDO::PARAM_INT);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro ao inserir: ".$erro->getMessage());
        }
    }

    public function exibir():array {
        $sql = "SELECT * FROM estilos";

        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->execute();
            $resultado = $consulta->fetchAll();
        } catch (Exception $erro) {
            die("Erro ao exibir: ".$erro->getMessage());
        }
        return $resultado;
    }

    public function exibirUm():array {
        $sql = "SELECT * FROM estilos WHERE portifolio_id = :portifolio_id";

        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->execute();
            $resultado = $consulta->fetch();
        } catch (Exception $erro) {
            die("Erro ao exibir: ".$erro->getMessage());
        }
        return $resultado;
    }

    public function atualizar():void {
        $sql = "UPDATE FROM estilos SET nome = :nome WHERE id = :id";

        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindValue(":nome", $this->nome, PDO::PARAM_STR);
            $consulta->bindValue(":id", $this->id, PDO::PARAM_INT);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro ao atualizar: ".$erro->getMessage());
        }
    }


    // Getters, Setters e Sanitização
    public function getId(): int
    {
        return $this->id;
    } 
    public function setId(int $id): self {
        $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        return $this;
    }

    public function getNome(): string {
        return $this->nome;
    }
    public function setNome(string $nome): self {
        $this->nome = filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS);
        return $this;
    }

   
    public function getPortfolioId(): int {
        return $this->portfolio_id;
    }
    public function setPortfolioId(int $portfolio_id): self {
        $this->portfolio_id = filter_var($portfolio_id, FILTER_SANITIZE_NUMBER_INT);
        return $this;
    }
}