<?php
// Namespace
namespace Inkwizards;
use PDO, Exception;

// Classe
class Portfolio {
    private int $id;
    private string $imagem;
    private string $descricao;
    private PDO $conexao;
    
    public Usuario $usuario;
    public Estilo $estilo;

    public function __construct(){
        $this->usuario = new Usuario;
        $this->estilo = new Estilo;
        $this->conexao = Banco::conecta();
    }



    // Metodos CRUD
    // Inserir
    public function inserir(): void {
        $sql = "INSERT INTO portfolio(imagem, descricao,usuario_id, estilo_id) VALUES (:imagem, :descricao, :usuario_id, :estilo_id)";

        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindValue(":imagem", $this->imagem, PDO::PARAM_STR);
            $consulta->bindValue(":descricao", $this->descricao, PDO::PARAM_STR);
            $consulta->bindValue(":usuario_id", $this->usuario->getId(), PDO::PARAM_INT);
            $consulta->bindValue(":estilo_id", $this->estilo->getId(), PDO::PARAM_INT);
        } catch (Exception $erro) {
            die("Erro ao inserir". $erro->getMessage());
        }
    }

    // Exibir
    public function exibir(): array {
        $sql = "SELECT * FROM portfolio";
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die("Erro ao exibir ". $erro->getMessage());
        }
        return $resultado;
    }

    // Exibir Um
    public function exibirUm(): array {
        $sql = "SELECT * FROM portfolio WHERE id = :id";
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindValue(":id", $this->id, PDO::PARAM_INT);
            $consulta->execute();
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die("Erro ao exibir dados de um usuário". $erro->getMessage());
        }
        return $resultado;
    }

    // Atualizar
    public function atualizar(): void {
        $sql = "UPDATE portfolio 
        SET imagem = :imagem, descricao = :descricao, usuario_id = :usuario_id, estilo_id = :estilo_id
        WHERE id = :id";

        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindValue(":id", $this->id, PDO::PARAM_INT);
            $consulta->bindValue("imagem", $this->imagem, PDO::PARAM_STR);
            $consulta->bindValue(":usuario_id", $this->usuario->getId(), PDO::PARAM_INT);
            $consulta->bindValue(":estilo_id", $this->estilo->getId(), PDO::PARAM_INT);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro ao atualizar". $erro->getMessage());
        }
    }

    // Excluir
    public function excluir(): void {
        $sql = "DELETE * FROM portfolio WHERE id = :id";
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindValue(":id", $this->id, PDO::PARAM_INT);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro ao deletar". $erro->getMessage());
        }
    }

    
    // Metodo de Upload
    public function upload(array $arquivo): void {
        $tiposValidos = ["image/png", "image/jpeg", "image/gif", "image/svg+xml"];

        if(!in_array($arquivo['type'], $tiposValidos)){
            die(
                "<script>
                alert('Formato inválido');
                history.back();
                </script>"
            );
        }

        $nome = $arquivo['name'];
        $temporario = $arquivo['tmp_name'];
        $pastaFinal = '../assets/imagens/portfolio'.$nome;
        move_uploaded_file($temporario, $pastaFinal);
    }




    // Getters e Setters
    // ID
    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): self {
        $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        return $this;
    }


    // IMAGEM
    public function getImagem(): string {
        return $this->imagem;
    }

    public function setImagem(string $imagem): self {
        $this->imagem = filter_var($imagem, FILTER_SANITIZE_SPECIAL_CHARS);
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


    // // CONEXÃO
    // public function getConexao(): PDO {
    //     return $this->conexao;
    // }

    // public function setConexao(PDO $conexao): self {
    //     $this->conexao = $conexao;
    //     return $this;
    // }
}