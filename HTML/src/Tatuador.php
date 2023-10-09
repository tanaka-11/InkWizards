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

    // Propriedade de conexao
    private PDO $conexao;
    // Metodo da conexão
    public function __construct(){
        $this->conexao = Banco::conecta();
    }

    // Metodo para inserir dados de um tatuador
    function verTatuadores(): array {
        $sql = "SELECT * FROM tatuadores";
    
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta -> execute();
            $resultado = $consulta -> fetchAll(PDO::FETCH_ASSOC);
    
        } catch(Exception $erro) {
            die("Falha na conexão do servidor: ".$erro->getMessage());
        }
    
        return $resultado;
    }

    // Getters, Setters e Sanitização
    // ID
    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): self {
        $this->id = $id;
        return $this;
    }

    // NOME
    public function getNome(): string {
        return $this->nome;
    }

    public function setNome(string $nome): self {
        $this->nome = $nome;
        return $this;
    }

    // DESCRIÇÃO
    public function getDescricao(): string {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): self {
        $this->descricao = $descricao;
        return $this;
    }
    
    // E-MAIL
    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): self {
        $this->email = $email;
        return $this;
    }

    // SENHA
    public function getSenha(): string {
        return $this->senha;
    }

    public function setSenha(string $senha): self {
        $this->senha = $senha;
        return $this;
    }

   
    public function getLocalizacaoId(): int {
        return $this->localizacao_id;
    }

    public function setLocalizacaoId(int $localizacao_id): self {
        $this->localizacao_id = $localizacao_id;
        return $this;
    }
}