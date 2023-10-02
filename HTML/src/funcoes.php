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
function inserirTatuador(PDO $conexao, string $nome, string $email, string $senha, string $descricao, string $localizacao_id): void {
    $sql = "INSERT INTO tatuadores (nome, email, senha, descricao, localizacao_id) VALUES (:nome, :email, :senha, :descricao, :localizacao_id)";
    
    try {
        $consulta = $conexao -> prepare($sql);

        $consulta -> bindValue(":nome", $nome, PDO::PARAM_STR);

        $consulta -> bindValue(":email", $email, PDO::PARAM_STR);

        $consulta -> bindValue(":senha", $senha, PDO::PARAM_STR);

        $consulta -> bindValue(":descricao", $descricao, PDO::PARAM_STR);

        $consulta -> bindValue(":localizacao_id", $localizacao_id, PDO::PARAM_STR);

        // $consulta -> bindValue(":cep", $cep, PDO::PARAM_INT);

        // $consulta -> bindValue(":logradouro", $logradouro, PDO::PARAM_STR);

        // $consulta -> bindValue(":numero", $numero, PDO::PARAM_INT);

        // $consulta -> bindValue(":bairro", $bairro, PDO::PARAM_STR);

        // $consulta -> bindValue(":complemento", $complemento, PDO::PARAM_STR);

        $consulta -> execute();

    } catch (Exception $erro) {
        die("Erro ao inserir tatuador: ".$erro->getMessage());
    }
}

