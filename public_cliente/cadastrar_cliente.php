<?php

include "../infra/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];

    $sql = "INSERT INTO clientes (nome, email, telefone, endereco) VALUES (?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql);

    if ($stmt === false) {
        die("Erro ao preparar a consulta: " . $conexao->error);
    }

    $stmt->bind_param("ssss", $nome, $email, $telefone, $endereco);

    if ($stmt->execute()) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Erro ao cadastrar cliente: " . $stmt->error;
    }

    $stmt->close();
}

?>