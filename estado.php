<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['cadastrar_estado'])) {
        $sigla = $_POST['sigla'];
        $nome = $_POST['nome'];

        $sql = "INSERT INTO estados (sigla, nome) VALUES ('$sigla', '$nome')";

        if ($conn->query($sql) === TRUE) {
            echo "Estado cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar estado: " . $conn->error;
        }
    } elseif (isset($_POST['excluir_estados'])) {
        $sqlExcluirCidades = "DELETE FROM cidades";
        if ($conn->query($sqlExcluirCidades) === TRUE) {
            $sqlExcluirEstados = "DELETE FROM estados";
            if ($conn->query($sqlExcluirEstados) === TRUE) {
                echo "Todos os estados e suas cidades foram excluídos com sucesso!";
            } else {
                echo "Erro ao excluir estados: " . $conn->error;
            }
        } else {
            echo "Erro ao excluir cidades: " . $conn->error;
        }
    } elseif (isset($_POST['excluir_estado'])) {
        $estadoId = $_POST['excluir_estado'];

        $sqlExcluirCidades = "DELETE FROM cidades WHERE estado_id = $estadoId";
        if ($conn->query($sqlExcluirCidades) === TRUE) {
            $sqlExcluirEstado = "DELETE FROM estados WHERE id = $estadoId";
            if ($conn->query($sqlExcluirEstado) === TRUE) {
                echo "Estado e suas cidades foram excluídos com sucesso!";
            } else {
                echo "Erro ao excluir estado: " . $conn->error;
            }
        } else {
            echo "Erro ao excluir cidades associadas ao estado: " . $conn->error;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Estados</title>
</head>
<body>
    <h2>Cadastrar Estado</h2>
    <form method="post" action="estado.php">
        Sigla: <input type="text" name="sigla" required>
        Nome: <input type="text" name="nome" required>
        <input type="submit" name="cadastrar_estado" value="Cadastrar">
    </form>

    <h2>Listar Estados</h2>
    <?php
        $sql = "SELECT * FROM estados";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h3>Estados Cadastrados:</h3>";
            echo "<ul>";
            while ($row = $result->fetch_assoc()) {
                echo "<li>Sigla: " . $row["sigla"]. " - Nome: " . $row["nome"]. 
                     " <form method='post' action='estado.php' style='display:inline;'>
                           <input type='hidden' name='excluir_estado' value='{$row["id"]}'>
                           <input type='submit' value='Excluir'>
                         </form></li>";
            }
            echo "</ul>";
        } else {
            echo "Nenhum estado cadastrado.";
        }
    ?>

    <form method="post" action="estado.php">
        <input type="submit" name="excluir_estados" value="Excluir Todos os Estados e Cidades">
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
