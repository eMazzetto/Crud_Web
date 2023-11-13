<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['cadastrar_cidade'])) {
        $cidadeNome = $_POST['cidadeNome'];
        $estadoId = $_POST['estadoId'];

        $sql = "INSERT INTO cidades (nome, estado_id) VALUES ('$cidadeNome', $estadoId)";



        if ($conn->query($sql) === TRUE) {
            echo "Cidade cadastrada com sucesso!";
        } else {
            echo "Erro ao cadastrar cidade: " . $conn->error;
        }


    } elseif (isset($_POST['excluir_cidades'])) {
        $sqlExcluirCidades = "DELETE FROM cidades";
        if ($conn->query($sqlExcluirCidades) === TRUE) {
            echo "Excluído as cidades com sucesso!";
        } else {
            echo "Erro ao retirar cidades! " . $conn->error;
        }
    } elseif (isset($_POST['excluir_cidade'])) {
        $cidadeId = $_POST['excluir_cidade'];

        $sql = "DELETE FROM cidades WHERE id = $cidadeId";

        if ($conn->query($sql) === TRUE) {
            echo "Cidade excluída com êxito!";
        } else {
            echo "Erro ao retirar cidade: " . $conn->error;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Cidades</title>
</head>

<body>
    <h2>Cadastrar Cidade</h2>
    <form method="post" action="cidade.php">
        Nome da Cidade: <input type="text" name="cidadeNome" required>
        Estado: 
        <select name="estadoId">
            <?php
                $sql = "SELECT id, sigla FROM estados";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row["id"]}'>{$row["sigla"]}</option>";
                }
            ?>
        </select>
        <input type="submit" name="cadastrar_cidade" value="Cadastrar">
    </form>

    <h2>Listar Cidades</h2>
    <?php
        $sql = "SELECT cidades.id, cidades.nome as cidade, estados.sigla as estado_sigla 
                FROM cidades 
                INNER JOIN estados ON cidades.estado_id = estados.id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h3>Cidades Cadastradas:</h3>";
            echo "<ul>";
            while ($row = $result->fetch_assoc()) {
                echo "<li>ID: " . $row["id"]. " - Cidade: " . $row["cidade"]. " - Estado: " . $row["estado_sigla"]. 
                     " <form method='post' action='cidade.php' style='display:inline;'>
                           <input type='hidden' name='excluir_cidade' value='{$row["id"]}'>
                           <input type='submit' value='Excluir'>
                         </form></li>";
            }
            echo "</ul>";
        } else {
            echo "Nenhuma cidade cadastrada.";
        }
    ?>

    <form method="post" action="cidade.php">
        <input type="submit" name="excluir_cidades" value="Excluir Todas as Cidades">
    </form>

    <br>
    <a href="index.php"><button>Voltar para o Índice</button></a>
    <style>
    body {
        font-family: 'Courier New', Courier, monospace, sans-serif;
        margin: 30px;
        padding: 30px;
        background-color: #666;
    }

    h2 {
        color: #331;
    }

    form {
        margin-bottom: 30px;
    }

    input, select {
        margin-bottom: 15px;
        padding: 12px;
    }

    button {
        padding: 10px;
        background-color: #darkviolet;
        color: #fff;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #darkviolet;
    }

    ul {
        list-style-type: none;
        padding: 0;
    }

    li {
        margin-bottom: 15px;
    }

    a {
        text-decoration: none;
        color: #4caf50;
    }

    a:hover {
        text-decoration: underline;
    }
</style>

</body>
</html>
