<?php
require_once './Controller/SelecaoController.php';  

$app = new SelecaoController();
$action = $_GET['action'] ?? ''; 
$id = $_GET['id'] ?? '';  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($action == 'atualizar') {
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
        
        default:
            $app->index();
            break;
    }
}
?>