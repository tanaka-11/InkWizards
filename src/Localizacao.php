<?php
namespace Inkwizards;
use PDO, Exception;


class Localizacao {
    // Propriedades da classe
    private int $id;
    private string $cep;
    private string $endereco;
    private string $numero;
    private string $bairro;
    private string $complemento;
    private int $usuarioId;

    public Usuario $usuario;
    
    // Propriedade de conexao
    private PDO $conexao;

    // Metodo da conexão
    public function __construct(){
        $this->conexao = Banco::conecta();
        $this->usuario = new Usuario;
    }

    // Metodo para exibir todos os dados da Localização
    public function exibirUm():array | bool {
        $sql = "SELECT * FROM localizacao WHERE usuario_id = :usuario_id";

        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindValue(":usuario_id", $this->usuario->getId(), PDO::PARAM_INT);
            $consulta->execute();
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die("Erro ao exibir localização: ".$erro->getMessage());
        }
        return $resultado;
    }

    // Metodo para inserir Localização
    public function inserir():void {
        $sql = "INSERT INTO localizacao(
            cep,
            endereco,
            numero,
            bairro,
            complemento,
            usuario_id
        ) VALUES (
            :cep,
            :endereco,
            :numero,
            :bairro,
            :complemento,
            :usuario_id
        )";
    
        try {
            $consulta = $this->conexao->prepare($sql);
    
            $consulta -> bindValue(":cep", $this->cep, PDO::PARAM_STR);
            $consulta -> bindValue(":endereco", $this->endereco, PDO::PARAM_STR);
            $consulta -> bindValue(":numero", $this->numero, PDO::PARAM_STR);
            $consulta -> bindValue(":bairro", $this->bairro, PDO::PARAM_STR);
            $consulta -> bindValue(":complemento", $this->complemento, PDO::PARAM_STR);
            $consulta->bindValue(":usuario_id", $this->usuario->getId(), PDO::PARAM_INT);
    
            $consulta -> execute();
        } catch (Exception $erro) {
            die("Erro ao inserir localização: ".$erro->getMessage());
        }
    }


    // Metodo para atualizar dados da localização
    public function atualizar() {
        $sql = "UPDATE localizacao SET
        cep = :cep,
        endereco = :endereco,
        numero = :numero,
        bairro = :bairro,
        complemento = :complemento
        WHERE id = :id";
    
        try {
            $consulta = $this->conexao->prepare($sql);
    
            $consulta -> bindValue(":id", $this->id, PDO::PARAM_INT);
            $consulta -> bindValue(":cep", $this->cep, PDO::PARAM_STR);
            $consulta -> bindValue(":endereco", $this->endereco, PDO::PARAM_STR);
            $consulta -> bindValue(":numero", $this->numero, PDO::PARAM_STR);
            $consulta -> bindValue(":bairro", $this->bairro, PDO::PARAM_STR);
            $consulta -> bindValue(":complemento", $this->complemento, PDO::PARAM_STR);
            $consulta -> execute();
        } catch (Exception $erro) {
            die("Erro ao atualizar dados do tatuador. Tente Novamente".$erro->getMessage());
        }
    } 

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

    public function setCep(string $cep):self {
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
    public function getNumero():string {
        return $this->numero;
    }

    public function setNumero(string $numero):self {
        $this->numero = filter_var($numero, FILTER_SANITIZE_SPECIAL_CHARS);
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
