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
<<<<<<< Updated upstream
    private int $localizacao_id;
=======

    // Propriedade de conexao
    private PDO $conexao;
    // Metodo da conexão
    public function __construct(){
        $this->conexao = Banco::conecta();
    }

    // Metodo para inserir dados de um tatuador
    public function inserir(): void {
    
        $sql = "INSERT INTO tatuadores 
        (nome, descricao, email, senha) 
        VALUES (:nome, :descricao, :email, :senha)";
        
        try {
            $consulta = $this->conexao -> prepare($sql);
    
            $consulta -> bindValue(":nome", $this->nome, PDO::PARAM_STR);
            $consulta -> bindValue(":descricao", $this->descricao, PDO::PARAM_STR);
            $consulta -> bindValue(":email", $this->email, PDO::PARAM_STR);
            $consulta -> bindValue(":senha", $this->senha, PDO::PARAM_STR);
    
    
            $consulta -> execute();
    
        } catch (Exception $erro) {
            die("Erro ao inserir tatuador: ".$erro->getMessage());
        }
    }

    // Getters, Setters e Sanitização
    // ID
    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): self {
        $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        return $this;
    }

    // NOME
    public function getNome(): string {
        return $this->nome;
    }

    public function setNome(string $nome): self {
        $this->nome = filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS);
        return $this;
    }

    // DESCRIÇÃO
    public function getDescricao(): string {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): self {
        $this->descricao = filter_var($descricao, FILTER_SANITIZE_SPECIAL_CHARS);
        return $this;
    }
    
    // E-MAIL
    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): self {
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
        return $this;
    }

    // SENHA
    public function getSenha(): string {
        return $this->senha;
    }

    public function setSenha(string $senha): self {
        $this->senha = password_hash($senha, PASSWORD_BCRYPT);
        return $this;
    }
>>>>>>> Stashed changes
}