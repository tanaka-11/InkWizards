<?php
require_once "conecta.php";

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