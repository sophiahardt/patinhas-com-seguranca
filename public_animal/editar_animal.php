<?php

include "../infra/conexao.php";

$id = $_GET["id_animal"];
$sql = "SELECT * FROM animais WHERE id = ?";

$consulta = $conexao->prepare($sql);
$consulta->bind_param("i", $id);
$consulta->execute();

$resultado = $consulta->get_result();
$animal = $resultado->fetch_assoc();

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
        <h2>Editando o animal <?php echo $animal["nome"]?>!</h2>
        <form action="atualizar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $animal["id"]?>">

            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php echo $animal["nome"]?>">
            <br>
            <label for="especie">Especie:</label>
            <input type="text" name="especie" value="<?php echo $animal["especie"]?>">
            <br>
            <label for="raca">Raça:</label>
            <input type="text" name="raca" value="<?php echo $animal["raca"]?>">
            <br>
            <label for="idade">Idade:</label>
            <input type="text" name="idade" value="<?php echo $animal["idade"]?>">
            <br>
            <button type="submit">Atualizar</button>
        </form>

    </main>
    <footer>

    </footer>


</body>

</html>