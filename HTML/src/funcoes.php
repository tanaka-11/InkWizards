<?php
require_once "conecta.php";

// Função para exibir os dados do tatuador
function verTatuadores(PDO $conexao): array {
    $sql = "SELECT * FROM tatuadores";

    try {
        $consulta = $conexao -> prepare($sql);
        $consulta -> execute();
        $resultado = $consulta -> fetchAll(PDO::FETCH_ASSOC);

    } catch(Exception $erro) {
        die("Falha na conexão do servidor: ".$erro->getMessage());
    }

    return $resultado;
}

// Função de inserir dados do tatuador
function inserirTatuador(PDO $conexao, string $nome,string $descricao, string $email, string $senha): void {
    
    $sql = "INSERT INTO tatuadores 
    (nome, descricao, email, senha) 
    VALUES (:nome, :descricao, :email, :senha)";
    
    try {
        $consulta = $conexao -> prepare($sql);

        $consulta -> bindValue(":nome", $nome, PDO::PARAM_STR);
        $consulta -> bindValue(":descricao", $descricao, PDO::PARAM_STR);
        $consulta -> bindValue(":email", $email, PDO::PARAM_STR);
        $consulta -> bindValue(":senha", $senha, PDO::PARAM_STR);


        $consulta -> execute();

    } catch (Exception $erro) {
        die("Erro ao inserir tatuador: ".$erro->getMessage());
    }
}

// função para inserir localização
function inserirLocalizacao(PDO $conexao, string $cep, string $endereco, int $numero, string $bairro, string $complemento, int $tatuadoresId):void {
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
        $consulta = $conexao->prepare($sql);

        $consulta -> bindValue(":cep", $cep, PDO::PARAM_INT);
        $consulta -> bindValue(":endereco", $endereco, PDO::PARAM_STR);
        $consulta -> bindValue(":numero", $numero, PDO::PARAM_INT);
        $consulta -> bindValue(":bairro", $bairro, PDO::PARAM_STR);
        $consulta -> bindValue(":complemento", $complemento, PDO::PARAM_STR);
        $consulta->bindValue(":tatuadores_id", $tatuadoresId, PDO::PARAM_INT);

        $consulta -> execute();
    } catch (Exception $erro) {
        die("Erro ao inserir localização: ".$erro->getMessage());
    }
}

function atualizarLocalizacao(PDO $conexao, int $id, string $cep, string $endereco, int $numero, string $bairro, string $complemento) {
    $sql = "UPDATE tatuadores SET
    cep = :cep,
    endereco = :endereco,
    numero = :numero,
    bairro = :bairro,
    complemento = :complemento
    WHERE id = :id";

    try {
        $consulta = $conexao -> prepare($sql);

        $consulta -> bindValue(":id", $id, PDO::PARAM_INT);
        $consulta -> bindValue(":cep", $cep, PDO::PARAM_INT);
        $consulta -> bindValue(":endereco", $endereco, PDO::PARAM_STR);
        $consulta -> bindValue(":numero", $numero, PDO::PARAM_INT);
        $consulta -> bindValue(":bairro", $bairro, PDO::PARAM_STR);
        $consulta -> bindValue(":complemento", $complemento, PDO::PARAM_STR);
    } catch (Exception $erro) {
        die("Erro ao atualizar dados do tatuador. Tente Novamente".$erro->getMessage());
    }
} 
   

