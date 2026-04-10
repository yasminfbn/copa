<?php
require_once './Model/Selecao.php';
require_once './Model/Database.php';

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
        $limite = 5;
        
        $listas = $this->selecao->getSelecoesPaginadas($grupo, $pagina, $limite);
        $total = $this->selecao->contarSelecoes($grupo);
        $totalPaginas = ceil($total / $limite);
        
        require_once './View/lista.php';
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

            if (empty($dados['nome']) || empty($dados['grupo']) || empty($dados['titulos'])) {
                header('Location: index.php?status=erro&msg=Preecha todos os campos obrigatórios');
                exit();
            }

            if ($this->selecao->salvar($dados)) {
                header('Location: index.php?status=sucesso&msg=Seleção salva com sucesso!');
            } else {
                header('Location: index.php?status=erro&msg=Erro ao salvar seleção');
            }
            exit();
        }
        
        header('Location: index.php');
        exit();
    }

    public function criar() {
        require_once './View/create.php';
    }

    public function editar($id) {
        $lista = $this->selecao->buscarId($id);
        if ($lista) {
            require_once './View/editar.php';
        } else {
            header('Location: index.php?status=erro&msg=Não encontrado!');
            exit();
        }
    }

    public function atualizarDados() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'id'      => (int)$_POST['id'],
                'nome'    => htmlspecialchars(trim($_POST['nome']), ENT_QUOTES, 'UTF-8'),
                'grupo'   => htmlspecialchars(trim($_POST['grupo']), ENT_QUOTES, 'UTF-8'),
                'titulos' => htmlspecialchars(trim($_POST['titulos']), ENT_QUOTES, 'UTF-8'),
                'bandeira'=> $_POST['bandeira'] ?? ''
            ];

            if ($this->selecao->atualizarDados($dados)) {
                header('Location: index.php?status=atualizado!');
                exit();
            }
        }
    }

    public function delete($id) {
        if ($this->selecao->deletar($id)) {
            header('Location: index.php?status=sucesso&msg=Excluído');
            exit();
        }
    }
}