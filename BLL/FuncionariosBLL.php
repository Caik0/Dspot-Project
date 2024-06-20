<?php
require_once '../DAL/Conexao.php';
require_once '../DTO/FuncionariosDTO.php';
/* $dominio = $_POST['dominio'];
$email = $_POST['email'];
$senha = $_POST['senha']; */

$conn = new Conexao;

class FuncionariosBLL extends Funcionario {

    function LoginFuncionario($dominio, $email, $senha){

        global $conn;
        $conn = $conn->retornaConexao();

        $sql_code = "SELECT DISTINCT * FROM Gerente INNER JOIN Empresa ON(Gerente.fk_idEmpresa = Empresa.idEmpresa)
        WHERE Empresa.dominio = :dominio AND Gerente.emailGerente = :email AND Gerente.senhaGerente = :senha";
        $stmt = $conn->prepare($sql_code);
        $stmt->bindParam(':dominio', $dominio);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
}



var_dump($resultado);
?>