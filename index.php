<?php
include "../infra/conexao.php";

$sql  = "SELECT animais.*, clientes.nome 
FROM animais
INNER JOIN clientes 
ON animais.cliente_id = clientes.id";

$consulta = $conexao->prepare($sql);
$consulta->execute();
$animais = $consulta->get_result();

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AUmigos - Patinhas com Segurança</title>
</head>

<body>
    <header>
        <h1>AUmigos - Patinhas com Segurança</h1>
    </header>

    <main>
        <h2>Cadastre um cliente</h2>
        <form action="public/cadastrar_cliente.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" name="nome">
            <br>
            <label for="email">Email:</label>
            <input type="text" name="email">
            <br>
            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone">
            <br>
            <label for="endereco">Endereço:</label>
            <input type="text" name="endereco">
            <br>
            <button type="submit">Cadastrar</button>
        </form>

        <?php

        $sqlUsuarios = "SELECT * FROM usuarios";
        $consultaUsuarios = $conexao->prepare($sqlUsuarios);
        $consultaUsuarios->execute();
        $usuarios = $consultaUsuarios->get_result();

        while ($usuario = $usuarios->fetch_assoc()) {
            echo "<option value='{$usuario["id_usuario"]}'>{$usuario["nome_usuario"]}</option>";
        }
        ?>

        </select>

        <br>

        <button type="submit">Cadastrar</button>

        

    </main>
</body>

</html>