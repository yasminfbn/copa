<?php
namespace App\Controller;

use App\Model\Jogador;
use App\Model\Database;
use PDO;
use App\Helpers\FlashMessage;

class JogadorController {
    private $db;
    private $jogador;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->jogador = new Jogador($this->db);
    }

    public function elenco($id) {
        $selecao_id = (int)$id;
        if (!$selecao_id) {
            header('Location: index.php');
            exit();
        }

        $pagina = max(1, (int)($_GET['pagina'] ?? 1));
        $limite = 6;

        $totalJogadores = $this->jogador->contarPorSelecao($selecao_id);
        $totalPaginas = max(1, (int)ceil($totalJogadores / $limite));

        if ($pagina > $totalPaginas) {
            $pagina = $totalPaginas;
        }

        $offset = ($pagina - 1) * $limite;

        $jogadores = $this->jogador->listarPorSelecaoPaginado($selecao_id, $limite, $offset);
        $selecao = $this->buscarSelecao($selecao_id);

        require_once __DIR__ . '/../../View/elenco.php';
    }

    public function adicionarJogador($selecao_id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'nome' => trim($_POST['nome'] ?? ''),
                'posicao' => trim($_POST['posicao'] ?? ''),
                'numeroCamisa' => (int)($_POST['numeroCamisa'] ?? 0),
                'selecao_id' => (int)$selecao_id
            ];

            if ($dados['nome'] === '' || $dados['posicao'] === '' || $dados['numeroCamisa'] <= 0 || $dados['selecao_id'] <= 0) {
                header('Location: index.php?status=erro&msg=Preencha todos os dados');
                exit();
            }

            if ($this->jogador->salvar($dados)) {
                header('Location: index.php?action=elenco&id=' . $selecao_id . '&status=sucesso&msg=Jogador cadastrado com sucesso');
                exit();
            }

            header('Location: index.php?action=elenco&id=' . $selecao_id . '&status=erro&msg=Erro ao cadastrar jogador');
            exit();
        }

        $selecao = $this->buscarSelecao($selecao_id);
        require_once __DIR__ . '/../../View/cadastrarJogador.php';
    }

    public function atualizarJogador() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'id' => (int)($_POST['id'] ?? 0),
                'nome' => trim($_POST['nome'] ?? ''),
                'posicao' => trim($_POST['posicao'] ?? ''),
                'numeroCamisa' => (int)($_POST['numeroCamisa'] ?? 0)
            ];

            if ($dados['id'] <= 0 || $dados['nome'] === '' || $dados['posicao'] === '' || $dados['numeroCamisa'] <= 0) {
                header('Location: index.php?status=erro&msg=Preencha todos os dados');
                exit();
            }

            if ($this->jogador->atualizar($dados)) {
                $j = $this->jogador->buscarId($dados['id']);
                header('Location: index.php?action=elenco&id=' . $j['selecao_id'] . '&status=sucesso&msg=Jogador atualizado com sucesso');
                exit();
            }

            header('Location: index.php?status=erro&msg=Erro ao atualizar jogador');
            exit();
        }

        header('Location: index.php');
        exit();
    }

    private function buscarSelecao($id) {
        $sql = "SELECT id, nome, grupo, bandeira FROM selecoes WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function editarJogador($id) {
        $jogador = $this->jogador->buscarId($id);
        if (!$jogador) {
            header('Location: index.php?status=erro&msg=Jogador não encontrado');
            exit();
        }

        $selecao = $this->buscarSelecao($jogador['selecao_id']);
        require_once __DIR__ . '/../../View/editarJogador.php';
    }

    public function deletarJogador($id) {
        if ($this->jogador->deletar($id)) {
            header('Location: index.php?status=sucesso&msg=Jogador excluído com sucesso');
            exit();
        }

        header('Location: index.php?status=erro&msg=Erro ao excluir jogador');
        exit();
    }
}