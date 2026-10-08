<?php
require_once __DIR__ . '/init.php';

$id = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = campo('id');

    if (isset($_SESSION['eventos'][$id])) {

        $evento = $_SESSION['eventos'][$id];
        $evento['titulo'] = campo('titulo');
        $evento['categoria'] = campo('categoria');
        $evento['data'] = campo('data');
        $evento['horario'] = campo('horario');
        $evento['local'] = campo('local');
        $evento['vagas'] = campo('vagas');
        $evento['descricao'] = campo('descricao');

        $mensagem = validar_evento($evento);

        if ($mensagem == '') {
            $_SESSION['eventos'][$id] = $evento;
            $mensagem = 'Evento atualizado com sucesso.';
        } else {
            $erroNaEdicao = 'sim';
        }

    } else {
        $mensagem = 'Evento não encontrado para edição.';
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
    <title>Edição de evento</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

    <h1>Edição de evento</h1>

    <?php require __DIR__ . '/nav.php'; ?>

    <p><?php echo mostrar($mensagem); ?></p>

    <?php if (isset($erroNaEdicao)) { ?>
        <form action="formEdicao.php" method="post">
            <select name="id">
                <option><?php echo mostrar($id); ?></option>
            </select>
            <button type="submit">Corrigir este evento</button>
        </form>
    <?php } ?>

    <p><a href="index.php">Voltar para os eventos</a></p>
    <p><a href="selecionar.php">Escolher outro evento</a></p>

</body>

</html>
