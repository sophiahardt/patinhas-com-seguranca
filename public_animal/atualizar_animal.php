<?php

include "../infra/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $especie = $_POST["especie"];
    $raca = $_POST["raca"];
    $idade = $_POST["idade"];

    $sql = "INSERT INTO animais (nome, especie, raca, idade) VALUES (?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql);
    if ($stmt === false) {
        die("Erro na preparação da declaração: " . $conexao->error);
    }

    $stmt->bind_param("ssss", $nome, $especie, $raca, $idade);

    if ($stmt->execute()) {
        echo "Animal cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar animal: " . $stmt->error;
    }

    $stmt->close();
}


?>