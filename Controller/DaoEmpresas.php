<?php
require_once("conexao.php");
require_once("../Model/Empresa.php");

class DaoEmpresas extends Empresa
{

    public static function inserir($dominio, $nome, $senha, $email, $telefone)
    {
        $connObj = new Conexao();
        $conn = $connObj->retornaConexao();

        $sql = "INSERT INTO Empresa (dominio, nomeEmpresa, senhaEmpresa, emailEmpresa, telefoneEmpresa) VALUES( :dominio, :nomeEmpresa, :senhaEmpresa, :email, :telefone)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":dominio", $dominio);
        $stmt->bindParam(":nomeEmpresa", $nome);
        $stmt->bindParam(":senhaEmpresa", $senha);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":telefone", $telefone);
        $stmt->execute();
    }

    public static function listar($dominio, $senha)
    {
        $connObj = new Conexao();
        $conn = $connObj->retornaConexao();
        $sql = "SELECT dominio FROM Empresa WHERE dominio = :dominio AND senhaEmpresa = :senha";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":dominio", $dominio);
        $stmt->bindParam(":senha", $senha);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public static function ContGerentes($dominio)
    {
        $connObj = new Conexao();
        $conn = $connObj->retornaConexao();


        $sql = "call contGerentes(:dominio, @quantTotal)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":dominio", $dominio);
        $stmt->execute();
        $stmt->closeCursor();
        $resultado = $conn->query("SELECT @quantTotal AS total")->fetch(PDO::FETCH_ASSOC);
        return $resultado['total'];
    }

}
