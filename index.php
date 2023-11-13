<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUDÃO</title>
</head>
<body>
    <h1>CRUD de Estados e Cidades</h1>

    <h2>Estados</h2>
    <ul>
        <li><a href="estado.php">Novo Estado:</a></li>
        <li><a href="estado.php?listar_estados">Listar Estados</a></li>

    </ul>

    <h2>Cidades</h2>
    <ul>
        <li><a href="cidade.php">Nova Cidade</a></li>
        <li><a href="cidade.php?listar_cidades">Listar Cidades</a></li>

    </ul>
    <style>
    body {
        font-family: 'Courier New', monospace, sans-serif;
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
        background-color: #4caf50;
        color: #fff;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: darkviolet;
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
