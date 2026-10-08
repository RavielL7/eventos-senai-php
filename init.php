<?php
session_start();
if (!isset($_SESSION['eventos'])) {
$_SESSION['eventos'] = [
1 => [
'id' => 1,
'titulo' => 'Oficina de PHP',
'descricao' => 'Crie páginas dinâmicas com PHP.',
'area' => 'Tecnologia da Informação',
'data' => '2026-10-20',
'inicio' => '09:00',
'fim' => '10:00',
'local' => 'Laboratório 1',
'responsavel' => 'Prof. Carlos'
],
2 => [
'id' => 2,
'titulo' => 'Introdução à Robótica',
'descricao' => 'Conheça sensores e programe um robô.',
'area' => 'Automação',
'data' => '2026-10-20',
'inicio' => '10:30',
'fim' => '11:30',
'local' => 'Laboratório 2',
'responsavel' => 'Profa. Ana'
]
];
$_SESSION['proximo_id'] = 3;
}
function campo($nome)
{
    if (isset($_POST[$nome]) && is_string($_POST[$nome])) {
        return trim($_POST[$nome]);
    }

    return '';
}
function mostrar($texto)
{
    return htmlspecialchars((string) $texto, ENT_QUOTES, 'UTF-8');
}
function validar_evento($evento)
{
    $categorias = ['Palestra', 'Oficina', 'Visita técnica', 'Feira'];

    if ($evento['titulo'] == '') {
        return 'Informe o título.';
    }
    if (!in_array($evento['categoria'], $categorias)) {
        return 'Escolha uma categoria válida.';
    }
    $dataCerta = date_create_from_format('!Y-m-d', $evento['data']);
    if ($dataCerta == false || date_format($dataCerta, 'Y-m-d') != $evento['data']) {
        return 'Informe uma data válida.';
    }
    $horaCerta = date_create_from_format('!H:i', $evento['horario']);
    if ($horaCerta == false || date_format($horaCerta, 'H:i') != $evento['horario']) {
        return 'Informe um horário válido.';
    }
    if ($evento['local'] == '') {
        return 'Informe o local.';
    }
    // Aceita somente um número inteiro de vagas maior que zero.
    $vagas = filter_var($evento['vagas'], FILTER_VALIDATE_INT);
    if ($vagas == false || $vagas < 1) {
        return 'As vagas devem ser um número inteiro maior que zero.';
    }
    return '';
}
