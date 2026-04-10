<?php

require_once './Model/Database.php';
require_once './Model/Selecao.php';
require_once './Controller/Controller.php';

$app = new Controller();
$action = $_GET['action'] ?? '';
$id = $_GET['id'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($action === 'atualizar') {
        $app->atualizarDados();
    } else {
        $app->salvar();
    }
} else {
    switch ($action) {
        case 'novo':
            $app->criar();
            break;

        case 'editar':
            $app->editar($id);
            break;

        case 'deletar':
            $app->delete($id);
            break;

        case 'listar':
            $app->listar();
            break;

        default:
            $app->index();
            break;
    }
}