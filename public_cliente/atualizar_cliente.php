<?php

include "../infra/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];

    $sql = "UPDATE clientes SET nome = ?, email = ?, telefone = ?, endereco = ? WHERE id = ?";

    $stmt = $conexao->prepare($sql);

    if ($stmt === false) {
        die("Erro na preparação da declaração: " . $conexao->error);
    }

    $stmt->bind_param("ssssi", $nome, $email, $telefone, $endereco, $id);

    if ($stmt->execute()) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Erro ao atualizar cliente: " . $stmt->error;
    }

    $stmt->close();
}

?>