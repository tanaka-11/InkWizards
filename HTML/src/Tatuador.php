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

    // Propriedade de conexao
    private PDO $conexao;
    // Metodo da conexão
    public function __construct(){
        $this->conexao = Banco::conecta();
    }
   

    // Metodo para exibir os dados do tatuador
    public function exibir(): array {
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

    // Método para exibir os dados de um tatuador
    public function exibirUm():array {
        $sql = "SELECT * FROM tatuadores WHERE id = :id";

        try {
            $consulta = $this->conexao->prepare($sql);

            $consulta->bindValue(":id", $this->id, PDO::PARAM_STR);
            
            $consulta->execute();

            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die("Erro ao exibir: ".$erro->getMessage());
        }
        return $resultado;
    }
    
    // Metodo de inserir dados do tatuador
    public function cadastrar(): void {
    
        $sql = "INSERT INTO tatuadores 
        (nome, descricao, email, senha) 
        VALUES (:nome, :descricao, :email, :senha)";
    
        try {
        $consulta = $this->conexao->prepare($sql);

        $consulta -> bindValue(":nome", $this->nome, PDO::PARAM_STR);
        $consulta -> bindValue(":descricao", $this->descricao, PDO::PARAM_STR);
        $consulta -> bindValue(":email", $this->email, PDO::PARAM_STR);
        $consulta -> bindValue(":senha", $this->senha, PDO::PARAM_STR);


        $consulta -> execute();

        } catch (Exception $erro) {
            die("Erro ao inserir tatuador: ".$erro->getMessage());
        }
    }

    // Método para atualizar um tatuador
    public function atualizar():void {
        $sql = "UPDATE tatuadores SET
            nome = :nome,
            descricao = :descricao,
            email = :email,
            senha = :senha WHERE id = :id";

            try {
                $consulta = $this->conexao->prepare($sql);

                $consulta->bindValue(":nome", $this->nome, PDO::PARAM_STR);
                $consulta->bindValue(":descricao", $this->descricao, PDO::PARAM_STR);
                $consulta->bindValue(":email", $this->email, PDO::PARAM_STR);
                $consulta->bindValue(":senha", $this->senha, PDO::PARAM_STR);
                $consulta->bindValue(":id", $this->id, PDO::PARAM_INT);

                $consulta->execute();
            } catch (Exception $erro) {
                die("Erro ao atualizar: ".$erro->getMessage());
            }
    }

    // Método para excluir um tatuador
    public function excluir():void {
        $sql = "DELETE FROM tatuadores WHERE id = :id";

        try {
            $consulta = $this->conexao->prepare($sql);

            $consulta->bindValue(":id", $this->id, PDO::PARAM_INT);

            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro ao excluir ".$erro->getMessage());
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
} 