
<?php
require_once __DIR__ . '/init.php';
?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eventos do SENAI</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <center><h1>Eventos do SENAI</h1></center>

    <?php require __DIR__ . '/nav.php'; ?>

    <?php foreach ($_SESSION['eventos'] as $evento) { ?>

        <?php $teveEvento = 'sim'; ?>

        <article>
            <h2><?php echo mostrar($evento['titulo']); ?></h2>

            <p><strong>ID:</strong> <?php echo $evento['id']; ?></p>
            <p><strong>Categoria:</strong> <?php echo mostrar($evento['categoria']); ?></p>
            <p><strong>Data:</strong> <?php echo mostrar($evento['data']); ?></p>
            <p><strong>Horário:</strong> <?php echo mostrar($evento['horario']); ?></p>
            <p><strong>Local:</strong> <?php echo mostrar($evento['local']); ?></p>
            <p><strong>Vagas:</strong> <?php echo mostrar($evento['vagas']); ?></p>
            <p><strong>Descrição:</strong> <?php echo mostrar($evento['descricao']); ?></p>
        </article>

        <hr>

    <?php } ?>

    <?php if (isset($teveEvento)) { ?>
        <p>Esses são os eventos cadastrados.</p>
    <?php } else { ?>
        <p>Nenhum evento cadastrado.</p>
    <?php } ?>

</body>

</html>
