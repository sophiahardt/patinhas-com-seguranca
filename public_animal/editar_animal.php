<?php

include "../infra/conexao.php";

$id = $_GET["id"];
$sql = "SELECT * FROM animais WHERE id = $id";
$resultado = $mysqli_query($conexao, $sql );

$animais = mysqli_fetch_assoc($resultado);

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
        <h2>Editando o animal <?php echo $animais["nome"]?>!</h2>
        <form action="atualizar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $animais["id"]?>">

            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php echo $animais["nome"]?>">
            <br>
            <label for="especie">Especie:</label>
            <input type="text" name="especie" value="<?php echo $animais["especie"]?>">
            <br>
            <label for="raca">Raça:</label>
            <input type="text" name="raca" value="<?php echo $animais["raca"]?>">
            <br>
            <label for="idade">Idade:</label>
            <input type="text" name="idade" value="<?php echo $animais["idade"]?>">
            <br>
            <button type="submit">Atualizar</button>
        </form>

    </main>
    <footer>

    </footer>


</body>

</html>