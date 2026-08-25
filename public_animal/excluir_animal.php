<?php
include "../infra/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];

    $sql = "DELETE FROM clientes WHERE id = ?";

    $stmt = $conexao->prepare($sql);
    if ($stmt === false) {
        die("Erro na preparação da declaração: " . $conexao->error);
    }

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Erro ao excluir cliente: " . $stmt->error;
    }

    $stmt->close();
}
?>