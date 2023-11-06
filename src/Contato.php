<?php
namespace Inkwizards;
use PDO, Exception;

class Contato {
    // Propriedades da classe
    private int $id;
    private string $telefone;
    private string $celular;
    private int $usuarioId;
    private PDO $conexao;
    public function __construct(){
        $this->conexao = Banco::conecta();
    }

    // Métodos

    // inserir contato
    public function inserir():void {
        $sql = "INSERT INTO contatos(
            telefone,
            celular,
            usuario_id
        ) VALUES (
            :telefone,
            :celular,
            :usuario_id
        )";
    
        try {
            $consulta = $this->conexao->prepare($sql);
    
            $consulta->bindValue(":telefone", $this->telefone, PDO::PARAM_STR);
            $consulta->bindValue(":celular", $this->celular, PDO::PARAM_STR);
            $consulta->bindValue(":usuario_id", $this->usuarioId, PDO::PARAM_INT);
    
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro ao inserir contatos: ".$erro->getMessage());
        }
    }

    public function exibirUm():array {
        $sql = "SELECT * FROM contatos WHERE id = :id";

        try {
            $consulta = $this->conexao->prepare($sql);

            $consulta->bindValue(":id", $this->id, PDO::PARAM_INT);
            $consulta->execute();
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die("Erro ao exibir: ".$erro->getMessage());
        }
        return $resultado;
    }

    public function atualizar():void {
        $sql = "UPDATE FROM contatos
                SET telefone = :telefone, celular = :celular
                WHERE id = :id";
        
        try {
            $consulta = $this->conexao->prepare($sql);

            $consulta->bindValue(":telefone", $this->telefone, PDO::PARAM_STR);
            $consulta->bindValue(":celular", $this->celular, PDO::PARAM_STR);
            $consulta->bindValue(":id", $this->id, PDO::PARAM_INT);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro ao atualizar: ".$erro->getMessage());
        }
    }

    public function excluir():void {
        $sql = "DELETE FROM contatos WHERE id = :id";

        try {
            $consulta = $this->conexao->prepare($sql);

            $consulta->bindValue(":id", $this->id, PDO::PARAM_INT);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro ao excluir: ".$erro->getMessage());
        }
    }

    // getters e setters + sanitização
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): self
    {
        $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        return $this;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }
    public function setTelefone(string $telefone): self
    {
        $this->telefone = filter_var($telefone, FILTER_SANITIZE_SPECIAL_CHARS);

        return $this;
    }

    public function getCelular(): string
    {
        return $this->celular;
    }
    public function setCelular(string $celular): self
    {
        $this->celular = filter_var($celular, FILTER_SANITIZE_SPECIAL_CHARS);

        return $this;
    }

    public function getUsuarioId(): int
    {
        return $this->usuarioId;
    }
    public function setUsuarioId(int $usuarioId): self
    {
        $this->usuarioId = filter_var($usuarioId, FILTER_SANITIZE_NUMBER_INT);

        return $this;
    }
}