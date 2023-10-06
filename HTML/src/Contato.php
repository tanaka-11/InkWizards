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