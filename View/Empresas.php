<?php 
require_once("../Controller/DaoEmpresas.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dominio = $_POST['dominio'];
    $senha = $_POST['senha'];

   /*  $message = DaoEmpresas::inserir($dominio, $nomeEmpresa, $senha,$email, $telefone); */
}
    $resultados = DaoEmpresas::listar($dominio, $senha);
    $quantGerentes = DaoEmpresas::ContGerentes($dominio);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresas</title>
</head>
<body>

                    <h3>Quantidade de Gerentes: <?= $quantGerentes ?></h3>


</body>
</html>