<?php
// Namespace
namespace Inkwizards;

// Classe
final class ControleDeAcesso {
    private string $pagina;
    // Metodo construtor para iniciar a sessão
    public function __construct(){
        if(!isset($_SESSION)){
            session_start();
        }
    }

    // Metodo de verificação de acesso
    public function verificaAcesso(): void {
        if (!isset($_SESSION['id'])) {
            session_destroy();
            header('location:../login.php?acesso_proibido');
            die();
        }
    }

    // Metodo de verificação ADMIN
    public function verificaAcessoAdmin(): void {
        if($_SESSION['tipo'] !== 'admin'){
            header('location:nao-autorizado.php');
            die();
        }
    }

    public function verificaAcessoTatuador():void {
        if($_SESSION['tipo'] !== 'tatuador'){
            header("location:nao-autorizado.php");
            die();
        }
    }

    // Metodo de acesso dos usuarios (LOGIN)
    public function login(int $id, string $nome, string $tipo): void {
        // Variaveis de sessão
        $_SESSION['id'] = $id;
        $_SESSION['nome'] = $nome;
        $_SESSION['tipo'] = $tipo;
    }

    // Metodo de saida dos usuarios (LOGOUT)
    public function logout(string $pagina): void {
        session_start();
        session_destroy();
        switch($pagina) {
            case "cadastro.php":
            case "index.php":
            case "login.php":
            case "artistas.php":
            case "estilos.php":
            case "contato.php":
                $urlRedirecionamento = "login.php?logout";
                break;
            default:
            $urlRedirecionamento = "../login.php?logout";
        }

        header("Location:" . $urlRedirecionamento);
        exit();
    }

    public function getPagina(): string
    {
        return $this->pagina;
    }
    public function setPagina(string $pagina): self
    {
        $this->pagina = filter_var($pagina, FILTER_SANITIZE_SPECIAL_CHARS);

        return $this;
    }
}