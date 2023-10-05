<?php
namespace Inkwizards;
use PDO, Exception;

class Localizacao {
    // Propriedades da classe
    private int $id;
    private string $cep;
    private string $endereco;
    private int $numero;
    private string $bairro;
    private string $complemento;

   // Getters, Setters e Sanitização

    // ID
    public function getId():int {
        return $this->id;
    }

    public function setId(int $id):self {
        $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        return $this;
    }

    // CEP
    public function getCep():string {
        return $this->cep;
    }

    public function setCep(int $cep):self {
        $this->cep = filter_var($cep, FILTER_SANITIZE_SPECIAL_CHARS);
        return $this;
    }

    // ENDEREÇO
    public function getEndereco():string {
        return $this->endereco;
    }

    public function setEndereco(string $endereco):self {
        $this->endereco = filter_var($endereco, FILTER_SANITIZE_SPECIAL_CHARS);
        return $this;
    }

    // NUMERO
    public function getNumero():int {
        return $this->numero;
    }

    public function setNumero(int $numero):self {
        $this->numero = filter_var($numero, FILTER_SANITIZE_NUMBER_INT);
        return $this;
    }

    // BAIRRO
    public function getBairro():string {
        return $this->bairro;
    }

    public function setBairro(string $bairro):self {
        $this->bairro = filter_var($bairro, FILTER_SANITIZE_SPECIAL_CHARS);
        return $this;
    }

    // COMPLEMENTO
    public function getComplemento(): string {
        return $this->complemento;
    }

    public function setComplemento(string $complemento): self {
        $this->complemento = filter_var($complemento, FILTER_SANITIZE_SPECIAL_CHARS);
        return $this;
    }
}
