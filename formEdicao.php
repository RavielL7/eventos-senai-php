<?php
require_once __DIR__ . '/init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = campo('id');

    if (isset($_SESSION['eventos'][$id])) {
        $evento = $_SESSION['eventos'][$id];
    } else {
        $mensagem = 'Evento nao encontrado para edicao.';
    }
} else {
    $mensagem = 'Escolha um evento para editar.';
}
?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar evento</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <center><h1>Editar evento</h1></center>

    <?php require __DIR__ . '/nav.php'; ?>

    <?php if (isset($mensagem)) { ?>

        <p><?php echo mostrar($mensagem); ?></p>
        <p><a href="selecionar.php">Voltar para a seleção</a></p>

    <?php } else { ?>

        <form action="processaEdicao.php" method="post">

            <p>
                <label for="id">ID do evento:</label><br>
                <select name="id" id="id">
            </p>

            <p>
                <label for="titulo">Título:</label><br>
                <textarea name="titulo" id="titulo" rows="1" cols="40" required><?php echo mostrar($evento['titulo']); ?></textarea>
            </p>

            <p>
                <label for="categoria">Categoria:</label><br>
                <select name="categoria" id="categoria" required>
                    <?php foreach (['Palestra', 'Oficina', 'Visita técnica', 'Feira'] as $categoria) { ?>
                        <option <?php if ($evento['categoria'] == $categoria) {
                                    echo 'selected';
                                } ?>><?php echo mostrar($categoria); ?></option>
                    <?php } ?>
                </select>
            </p>

            <p>
                <label for="data">Data:</label><br>
                <textarea name="data" id="data" rows="1" cols="20" required><?php echo mostrar($evento['data']); ?></textarea>
            </p>

            <p>
                <label for="horario">Horário:</label><br>
                <textarea name="horario" id="horario" rows="1" cols="20" required><?php echo mostrar($evento['horario']); ?></textarea>
            </p>

            <p>
                <label for="local">Local:</label><br>
                <textarea name="local" id="local" rows="1" cols="40" required><?php echo mostrar($evento['local']); ?></textarea>
            </p>

            <p>
                <label for="vagas">Vagas:</label><br>
                <textarea name="vagas" id="vagas" rows="1" cols="15" required><?php echo mostrar($evento['vagas']); ?></textarea>
            </p>

            <p>
                <label for="descricao">Descrição:</label><br>
                <textarea name="descricao" id="descricao" rows="4" cols="40"><?php echo mostrar($evento['descricao']); ?></textarea>
            </p>

            <button type="submit">Salvar alterações</button>

        </form>

        <p><a href="selecionar.php">Escolher outro evento</a></p>

    <?php } ?>

</body>

</html>
