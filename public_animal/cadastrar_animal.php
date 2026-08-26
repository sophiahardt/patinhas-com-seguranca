<?php

include "../infra/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $especie = $_POST["especie"];
    $raca = $_POST["raca"];
    $idade = $_POST["idade"];
    $cliente_id = $_POST["cliente_id"];

    $sql = "INSERT INTO animais (nome, especie, raca, idade, cliente_id) VALUES (?, ?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql);
    if ($stmt === false) {
        die("Erro ao preparar a consulta: " . $conexao->error);
    }
    $stmt->bind_param("sssii", $nome, $especie, $raca, $idade, $cliente_id);

    if ($stmt->execute()) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Erro ao cadastrar animal: " . $stmt->error;
    }

    $stmt->close();
}
?>