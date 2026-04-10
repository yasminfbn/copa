<?php
require_once './Model/Selecao.php';
require_once './config/Database.php';

class SelecaoController {
    private $db;
    private $selecao;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->selecao = new Selecao($this->db);
    }

    public function index() {
        $listas = $this->selecao->buscarTodos();
        require_once './View/lista.php';
    }

    public function salvar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'nome' => htmlspecialchars(trim($_POST['nome']), ENT_QUOTES, 'UTF-8'),
                'grupo' => htmlspecialchars(trim($_POST['grupo']), ENT_QUOTES, 'UTF-8'),
                'titulos' => htmlspecialchars(trim($_POST['titulos']), ENT_QUOTES, 'UTF-8'),
                'bandeira' => $_POST['bandeira'] ?? ''
            ];

            if (empty($dados['nome']) || empty($dados['grupo']) || empty($dados['titulos'])) {
                header('Location: index.php?status=erro&msg=Preecha todos os campos!');
                exit();
            }

            if ($this->selecao->salvar($dados)) {
                header('Location: index.php?status=sucesso');
                exit();
            } else {
                header('Location: index.php?status=erro&msg=Erro ao salvar');
                exit();
            }
        }
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
        }
    }

    public function atualizarDados() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'id' => (int)$_POST['id'],
                'nome' => htmlspecialchars(trim($_POST['nome']), ENT_QUOTES, 'UTF-8'),
                'grupo' => htmlspecialchars(trim($_POST['grupo']), ENT_QUOTES, 'UTF-8'),
                'titulos' => htmlspecialchars(trim($_POST['titulos']), ENT_QUOTES, 'UTF-8'),
                'bandeira' => $_POST['bandeira'] ?? ''
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
?>