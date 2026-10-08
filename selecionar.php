<?php
require_once __DIR__ . '/init.php';
?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Escolher evento para editar</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <center><h1>Escolher evento para editar</h1></center>

    <?php require __DIR__ . '/nav.php'; ?>

    <?php foreach ($_SESSION['eventos'] as $evento) { ?>
        <?php $temEvento = 'sim'; ?>
    <?php } ?>

    <?php if (isset($temEvento)) { ?>

        <p>Eventos disponíveis:</p>

        <ul>
            <?php foreach ($_SESSION['eventos'] as $evento) { ?>
                <li>
                    ID <?php echo $evento['id']; ?>:
                    <?php echo mostrar($evento['titulo']); ?>
                </li>
            <?php } ?>
        </ul>

        <p>Escolha o ID:</p>

        <form action="formEdicao.php" method="post">
            <select name="id" required>
                <?php foreach ($_SESSION['eventos'] as $evento) { ?>
                    <option><?php echo $evento['id']; ?></option>
                <?php } ?>
            </select>

            <button type="submit">Editar</button>
        </form>

    <?php } else { ?>

        <p>Nenhum evento cadastrado.</p>

    <?php } ?>

</body>

</html>
