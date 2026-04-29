<?php

namespace App\Controller;

use App\Model\Selecao;
use App\Model\Database;
use App\Helpers\FlashMessage;

class Controller {
    private $db;
    private $selecao;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->selecao = new Selecao($this->db);
    }

    public function index() {
        $grupo = $_GET['grupo'] ?? '';
        $pagina = max(1, (int)($_GET['pagina'] ?? 1));
        $limite = 7;
    
        $total = $this->selecao->contarSelecoes($grupo);
        $totalPaginas = max(1, (int)ceil($total / $limite));
    
        if ($pagina > $totalPaginas) {
            $pagina = $totalPaginas;
        }
    
        $listas = $this->selecao->getSelecoesPaginadas($grupo, $pagina, $limite);
    
        $totalSelecoes = $this->selecao->totalSelecoes();
        $totalTitulos = $this->selecao->totalTitulos();
        $selecoesPorGrupo = $this->selecao->selecoesPorGrupo();
    
        // Uso da constante BASE_PATH para encontrar a View na raiz
        require_once BASE_PATH . '/View/lista.php';
    }

    public function listar() {
        $this->index();
    }

    public function salvar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'nome' => htmlspecialchars(trim($_POST['nome'] ?? ''), ENT_QUOTES, 'UTF-8'),
                'grupo' => htmlspecialchars(trim($_POST['grupo'] ?? ''), ENT_QUOTES, 'UTF-8'),
                'titulos' => (int)($_POST['titulos'] ?? 0),
                'bandeira' => $_POST['bandeira'] ?? ''
            ];

            if (empty($dados['nome']) || empty($dados['grupo']) || $dados['titulos'] < 0) {
                header('Location: index.php?status=erro&msg=Preencha todos os campos obrigatórios');
                exit();
            }

            if ($this->selecao->salvar($dados)) {
                header('Location: index.php?status=sucesso&msg=Seleção salva com sucesso!');
            } else {
                header('Location: index.php?status=erro&msg=Erro ao salvar seleção!');
            }
            exit();
        }

        header('Location: index.php');
        exit();
    }

    public function criar() {
        // Ajustado para usar BASE_PATH
        require_once BASE_PATH . '/View/create.php';
    }

    public function editar($id) {
        $lista = $this->selecao->buscarId($id);
        if ($lista) {
            // Ajustado para usar BASE_PATH
            require_once BASE_PATH . '/View/editar.php';
        } else {
            header('Location: index.php?status=erro&msg=Não encontrado!');
            exit();
        }
    }

    public function deletar($id) {
        if ($this->selecao->deletar($id)) {
            header('Location: index.php?status=sucesso&msg=Excluído com sucesso!');
            exit();
        }
        header('Location: index.php?status=erro&msg=Erro ao excluir!');
        exit();
    }

    public function atualizarDados() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'id' => (int)($_POST['id'] ?? 0),
                'nome' => trim($_POST['nome'] ?? ''),
                'grupo' => trim($_POST['grupo'] ?? ''),
                'titulos' => (int)($_POST['titulos'] ?? 0),
                'bandeira' => trim($_POST['bandeira'] ?? '')
            ];
    
            if ($dados['id'] <= 0 || empty($dados['nome'])) {
                header('Location: index.php?status=erro&msg=Dados inválidos');
                exit();
            }
    
            if ($this->selecao->atualizarDados($dados)) {
                header('Location: index.php?status=sucesso&msg=Atualizado com sucesso!');
                exit();
            }
    
            header('Location: index.php?status=erro&msg=Erro ao atualizar!');
            exit();
        }
        header('Location: index.php');
        exit();
    }
}