<?php
include "../infra/conexao.php";

$sqlClientes = "SELECT * FROM clientes";
$consultaClientes = $conexao->prepare($sqlClientes);
$consultaClientes->execute();
$clientes = $consultaClientes->get_result();

$sqlAnimais = "SELECT animais.*, clientes.nome AS nome_cliente
               FROM animais
               INNER JOIN clientes
               ON animais.cliente_id = clientes.id";

$consultaAnimais = $conexao->prepare($sqlAnimais);
$consultaAnimais->execute();
$animais = $consultaAnimais->get_result();

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
            <input type="text" name="nome" required>
            <br>
            <label for="email">Email:</label>
            <input type="text" name="email" required>
            <br>
            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" required>
            <br>
            <label for="endereco">Endereço:</label>
            <input type="text" name="endereco" required>
            <br>
            <button type="submit">Cadastrar</button>
        </form>

        <h2>Clientes cadastrados</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Ações</th>
            </tr>

            <?php while ($cliente = $clientes->fetch_assoc()) { ?>

            <tr>
                <td><?php echo $cliente["id"]; ?></td>
                <td><?php echo $cliente["nome"]; ?></td>
                <td><?php echo $cliente["email"]; ?></td>
                <td><?php echo $cliente["telefone"]; ?></td>
                <td><?php echo $cliente["endereco"]; ?></td>

                <td>
                    <a href="public/editar_clientes.php?id_cliente=<?php echo $cliente["id"]; ?>">
                        Editar
                    </a>
                    <a href="public/excluir_clientes.php?id_cliente=<?php echo $cliente["id"]; ?>">
                        Excluir
                    </a>
                </td>
            </tr>

            <?php } ?>
                    
        </table>
        

        <h2>Animais cadastrados</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Espécie</th>
                <th>Raça</th>
                <th>Idade</th>
                <th>Responsável</th>
                <th>Ações</th>
            </tr>

            <?php while ($animal = $animais->fetch_assoc()) { ?>

            <tr>

                <td><?php echo $animal["id"]; ?></td>
                <td><?php echo $animal["nome"]; ?></td>
                <td><?php echo $animal["especie"]; ?></td>
                <td><?php echo $animal["raca"]; ?></td>
                <td><?php echo $animal["idade"]; ?></td>
                <td><?php echo $animal["nome_cliente"]; ?></td>
        
                <td>
                    <a href="public/editar_animais.php?id_animal=<?php echo $animal["id"]; ?>">
                        Editar
                    </a>
                    <a href="public/excluir_animais.php?id_animal=<?php echo $animal["id"]; ?>">
                        Excluir
                    </a>
                </td>
            </tr>
        
            <?php } ?>
        </table>


    </main>
</body>

</html>