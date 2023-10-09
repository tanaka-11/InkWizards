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
    private string $tatuadoresId;

    // Propriedade de conexao
    private PDO $conexao;
    // Metodo da conexão
    public function __construct(){
        $this->conexao = Banco::conecta();
    }

    // Metodo para EXIBIR todos os dados da Localização
    public function exibir():array {
        $sql = "SELECT * FROM localizacao";
        $consulta = $this->conexao->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        
        try {
            $sql = "SELECT * FROM localizacao";
            $consulta = $this->conexao->prepare($sql);
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $erro) {
            throw new Exception("Erro ao exibir localização: " . $erro->getMessage());
        }
    
    }

    // Metodo para INSERIR Localização
    public function inserir(): void {
        $sql = "INSERT INTO localizacao(
            cep,
            endereco,
            numero,
            bairro,
            complemento,
            tatuadores_id
        ) VALUES (
            :cep,
            :endereco,
            :numero,
            :bairro,
            :complemento,
            :tatuadores_id
        )";
    
        try {
            $consulta = $this->conexao->prepare($sql);
    
            $consulta -> bindValue(":cep", $this->cep, PDO::PARAM_INT);
            $consulta -> bindValue(":endereco", $this->endereco, PDO::PARAM_STR);
            $consulta -> bindValue(":numero", $this->numero, PDO::PARAM_INT);
            $consulta -> bindValue(":bairro", $this->bairro, PDO::PARAM_STR);
            $consulta -> bindValue(":complemento", $this->complemento, PDO::PARAM_STR);
            $consulta->bindValue(":tatuadores_id", $this->tatuadoresId, PDO::PARAM_INT);
    
            $consulta -> execute();
        } catch (Exception $erro) {
            die("Erro ao inserir localização: ".$erro->getMessage());
        }
    }

    // Metodo para excluir dados da localização
    public function excluir() {
        $sql = "DELETE FROM localizacao WHERE id = :id";
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindValue(":id", $this->id, PDO::PARAM_INT);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro ao deletar dados do tatuador. Tente Novamente".$erro->getMessage());
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

    // TATUADORES_ID
    public function getTatuadoresId(): string {
        return $this->tatuadoresId;
    }

    public function setTatuadoresId(string $tatuadoresId): self {
        $this->tatuadoresId = filter_var($tatuadoresId, FILTER_SANITIZE_NUMBER_INT);
        return $this;
    }
}
