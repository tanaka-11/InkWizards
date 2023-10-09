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

    private PDO $conexao;
    public function __construct(){
        $this->conexao = Banco::conecta();
    }

    // Métodos

    // inserir contato
    public function inserirContato():void {
        $sql = "INSERT INTO contatos(
            email,
            telefone,
            celular,
            tatuador_id
        ) VALUES (
            :email,
            :telefone,
            :celular,
            :tatuador_id
        )";
    
        try {
            $consulta = $this->conexao->prepare($sql);
    
            $consulta->bindValue(":email", $this->email, PDO::PARAM_STR);
            $consulta->bindValue(":telefone", $this->telefone, PDO::PARAM_INT);
            $consulta->bindValue(":celular", $this->celular, PDO::PARAM_INT);
            $consulta->bindValue(":tatuador_id", $this->tatuadoresId, PDO::PARAM_INT);
    
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro ao inserir contatos: ".$erro->getMessage());
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

    public function getEmail(): string
    {
        return $this->email;
    }
    public function setEmail(string $email): self
    {
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);

        return $this;
    }

    public function getTelefone(): int
    {
        return $this->telefone;
    }
    public function setTelefone(int $telefone): self
    {
        $this->telefone = filter_var($telefone, FILTER_SANITIZE_NUMBER_INT);

        return $this;
    }

    public function getCelular(): int
    {
        return $this->celular;
    }
    public function setCelular(int $celular): self
    {
        $this->celular = filter_var($celular, FILTER_SANITIZE_NUMBER_INT);

        return $this;
    }

    public function getTatuadoresId(): int
    {
        return $this->tatuadoresId;
    }
    public function setTatuadoresId(int $tatuadoresId): self
    {
        $this->tatuadoresId = filter_var($tatuadoresId, FILTER_SANITIZE_NUMBER_INT);

        return $this;
    }
}