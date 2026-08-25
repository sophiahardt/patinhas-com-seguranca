<?php

include "../infra/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome_animal = $_POST["nome_animal"];
    $especie = $_POST["especie"];
    $raca = $_POST["raca"];
    $idade = $_POST["idade"];

    $sql = "INSERT INTO animais (nome_animal, especie, raca, idade) VALUES (?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql);
    if ($stmt === false) {
        die("Erro na conexão!" . $conexao->error);
    }
    $stmt->bind_param("sssi", $nome_animal, $especie, $raca, $idade);
    
    if ($stmt->execute()) {
        echo "Animal cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar animal!";
    }
    $stmt->close();
}
?>