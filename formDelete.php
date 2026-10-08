<?php
require_once __DIR__ . '/init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = campo('id');

    if (isset($_POST['confirmar'])) {

        if (isset($_SESSION['eventos'][$id])) {

            $novosEventos = [];

            foreach ($_SESSION['eventos'] as $idDoEvento => $evento) {
                if ($idDoEvento == $id) {
                    // Não copia o evento escolhido.
                } else {
                    $novosEventos[$idDoEvento] = $evento;
                }
            }

            $_SESSION['eventos'] = $novosEventos;
            $mensagem = 'Evento excluído com sucesso.';

        } else {
            $mensagem = 'Evento não encontrado.';
        }

    } else {

        if (isset($_SESSION['eventos'][$id])) {
            $eventoEscolhido = $_SESSION['eventos'][$id];
        } else {
            $mensagem = 'Evento não encontrado.';
        }
    }
}
?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Excluir evento</title>
       <link rel="stylesheet" href="style.css">
</head>

<body>

    <center><h1>Excluir evento</h1></center>

    <?php require __DIR__ . '/nav.php'; ?>

    <?php if (isset($mensagem)) { ?>

        <p><?php echo mostrar($mensagem); ?></p>
        <p><a href="index.php">Voltar para os eventos</a></p>

    <?php } elseif (isset($eventoEscolhido)) { ?>

        <p>
            Deseja realmente excluir o evento
            <strong><?php echo mostrar($eventoEscolhido['titulo']); ?></strong>?
        </p>

        <form method="post">
            <select name="id" required>
                <option><?php echo $eventoEscolhido['id']; ?></option>
            </select>

            <button type="submit" name="confirmar">Sim, excluir</button>
        </form>

        <p><a href="formDelete.php">Cancelar</a></p>

    <?php } else { ?>

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

            <form method="post">
                <select name="id" required>
                    <?php foreach ($_SESSION['eventos'] as $evento) { ?>
                        <option><?php echo $evento['id']; ?></option>
                    <?php } ?>
                </select>

                <button type="submit">Continuar</button>
            </form>

        <?php } else { ?>

            <p>Nenhum evento cadastrado.</p>

        <?php } ?>

    <?php } ?>

</body>

</html>
