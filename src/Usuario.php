<?php
namespace Inkwizards;
use PDO, Exception;

class Usuario {
    // Propriedades da classe
    private int $id;
    private string $fotoPerfil;
    private string $nome;
    private string $descricao;
    private string $email;
    private string $senha;
    private string $tipo;

    // Propriedade de conexao
    private PDO $conexao;
    // Metodo da conexão
    public function __construct(){
        $this->conexao = Banco::conecta();
    }
   

    // Metodo para exibir os dados do tatuador
    public function exibir(): array {
        $sql = "SELECT * FROM usuarios";

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
        $sql = "SELECT * FROM usuarios WHERE id = :id";

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
    
        $sql = "INSERT INTO usuarios 
        (foto_perfil, nome, descricao, email, senha, tipo)
        VALUES (:foto_perfil, :nome, :descricao, :email, :senha, :tipo)";
    
        try {
        $consulta = $this->conexao->prepare($sql);

        $consulta -> bindValue(":foto_perfil", $this->fotoPerfil, PDO::PARAM_STR);
        $consulta -> bindValue(":nome", $this->nome, PDO::PARAM_STR);
        $consulta -> bindValue(":descricao", $this->descricao, PDO::PARAM_STR);
        $consulta -> bindValue(":email", $this->email, PDO::PARAM_STR);
        $consulta -> bindValue(":senha", $this->senha, PDO::PARAM_STR);
        $consulta -> bindValue(":tipo", $this->tipo, PDO::PARAM_STR);


        $consulta -> execute();

        } catch (Exception $erro) {
            die("Erro ao inserir tatuador: ".$erro->getMessage());
        }
    }

    // Método para atualizar um tatuador
    public function atualizar():void {
        $sql = "UPDATE usuarios SET
            foto_perfil = :foto_perfil,
            nome = :nome,
            descricao = :descricao,
            email = :email,
            senha = :senha
            tipo = :tipo WHERE id = :id";

            try {
                $consulta = $this->conexao->prepare($sql);

                $consulta->bindValue(":foto_perfil", $this->fotoPerfil, PDO::PARAM_STR);
                $consulta->bindValue(":nome", $this->nome, PDO::PARAM_STR);
                $consulta->bindValue(":descricao", $this->descricao, PDO::PARAM_STR);
                $consulta->bindValue(":email", $this->email, PDO::PARAM_STR);
                $consulta->bindValue(":senha", $this->senha, PDO::PARAM_STR);
                $consulta->bindValue(":id", $this->id, PDO::PARAM_INT);
                $consulta->bindValue(":tipo", $this->tipo, PDO::PARAM_STR);

                $consulta->execute();
            } catch (Exception $erro) {
                die("Erro ao atualizar: ".$erro->getMessage());
            }
    }

    // Método para excluir um tatuador
    public function excluir():void {
        $sql = "DELETE FROM usuarios WHERE id = :id";

        try {
            $consulta = $this->conexao->prepare($sql);

            $consulta->bindValue(":id", $this->id, PDO::PARAM_INT);

            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro ao excluir ".$erro->getMessage());
        }
    }

    // Métodos para codificação e comparação de senha
    public function codificaSenha(string $senha):string {
        return password_hash($senha, PASSWORD_DEFAULT);
    }

    public function buscar():array | bool {
        $sql = "SELECT * FROM usuarios WHERE email = :email";

        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindValue(":email", $this->email, PDO::PARAM_STR);
            $consulta->execute();
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die("Erro ao buscar usuário: ".$erro->getMessage());
        }
        return $resultado;
    }

    public function verificaSenha(string $senhaForm, string $senhaBanco):string {
        if(password_verify($senhaForm, $senhaBanco)) {
            return $senhaBanco;
        } else {
            return $this->codificaSenha($senhaForm);
        }
    }

    // Método para upload de foto
    public function upload(array $arquivo, string $pagina):void {
        $tiposValidos = [
            "image/png",
            "image/jpeg",
            "image/gif",
            "image/svg+xml"
        ];

        if(!in_array($arquivo['type'], $tiposValidos)) {
            die("
                <script>
                    alert('Formato inválido');
                    history.back();
                </script>
            ");
        }

        $nome = $arquivo["name"];
        $temporario = $arquivo["tmp_name"];

        if($pagina === "cadastro.php") {
            $pastaFinal = "assets/images/perfil/".$nome;
        } elseif($pagina === "portfolio-inserir.php" || $pagina === "portfolio-atualizar.php") {
            $pastaFinal = "../assets/images/portfolio/".$nome;
        } else {
            $pastaFinal = "../assets/images/perfil/".$nome;
        }

        move_uploaded_file($temporario, $pastaFinal);
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
        $this->senha = filter_var($senha, FILTER_SANITIZE_SPECIAL_CHARS);
        return $this;
    }

    public function getFotoPerfil(): string
    {
        return $this->fotoPerfil;
    }
    public function setFotoPerfil(string $fotoPerfil): self
    {
        $this->fotoPerfil = filter_var($fotoPerfil, FILTER_SANITIZE_SPECIAL_CHARS);

        return $this;
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }
    public function setTipo(string $tipo): self
    {
        $this->tipo = filter_var($tipo, FILTER_SANITIZE_SPECIAL_CHARS);

        return $this;
    }
} 