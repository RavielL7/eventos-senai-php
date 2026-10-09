<?php
require_once __DIR__ . '/init.php';
?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrar evento</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <center><h1>Registrar evento</h1></center>
    <?php require __DIR__ . '/nav.php'; ?>

    <form action="processaCadastro.php" method="post">
        <p>
            <label for="titulo">Título:</label><br>
            <input type="text" name="titulo" id="titulo" required>
        </p>
        <p>
            <label for="categoria">Categoria:</label><br>
            <select name="categoria" id="categoria" required>
                <option>Palestra</option>
                <option>Oficina</option>
                <option>Visita técnica</option>
                <option>Feira</option>
            </select>
        </p>
        <p>
            <label for="data">Data:</label><br>
            <input type="date" name="data" id="data" required>
        </p>
        <p>
            <label for="horario">Horário:</label><br>
            <input type="time" name="horario" id="horario" required>
        </p>
        <p>
            <label for="local">Local:</label><br>
            <input type="text" name="local" id="local" required>
        </p>
        <p>
            <label for="vagas">Vagas:</label><br>
            <input type="number" name="vagas" id="vagas" min="1" step="1" required>
        </p>
        <p>
            <label for="descricao">Descrição (opcional):</label><br>
            <textarea name="descricao" id="descricao" rows="4" cols="40"></textarea>
        </p>
        <button type="submit">Registrar</button>
    </form>
</body>

</html>
