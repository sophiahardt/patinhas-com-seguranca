<?php

include "../infra/conexao.php";

$id = $_GET["id"];
$sql = "SELECT * FROM clientes WHERE id = ?";

$consulta = $conexao->prepare($sql);
$consulta->bind_param("i", $id);
$consulta->execute();

$resultado = $consulta->get_result();
$cliente = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AUmigos - Patinhas com Segurança</title>
    <link rel="stylesheet" href="style/styles.css">
</head>

<body>
    <header>
        <h1>AUmigos - Patinhas com Segurança</h1>
    </header>
    <main>
        <h2>Editando o cliente <?php echo $cliente["nome"]?>!</h2>
        <form action="atualizar_cliente.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $cliente["id"]?>">

            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php echo $cliente["nome"]?>">
            <br>
            <label for="email">Email:</label>
            <input type="text" name="email" value="<?php echo $cliente["email"]?>">
            <br>
            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" value="<?php echo $cliente["telefone"]?>">
            <br>
            <label for="endereco">Endereço:</label>
            <input type="text" name="endereco" value="<?php echo $cliente["endereco"]?>">
            <br>
            <button type="submit">Atualizar</button>
        </form>

    </main>
    <footer>

    </footer>


</body>

</html>
