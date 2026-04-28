<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elenco</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>
    Elenco de <?= htmlspecialchars($selecao['nome'] ?? 'Seleção Desconhecida') ?>
</h1>

<?php if (isset($_GET['msg']) && $_GET['msg'] === 'deletado'): ?>
    <div class="success">
        Jogador excluído com sucesso!
    </div>
<?php endif; ?>

<p>
    <a class="btn_novaSelecao"
       href="index.php?action=adicionarJogador&id=<?= $selecao['id'] ?>">
       Adicionar jogador no elenco
    </a>
</p>

<label class="theme-switch">
    <input type="checkbox" id="toggleTheme">
    <span class="slider"></span>
</label>

<table>
    <tr>
        <th>Nome</th>
        <th>Posição</th>
        <th>Número</th>
        <th></th>
    </tr>

    <?php if (!empty($jogadores)): ?>
        <?php foreach ($jogadores as $jogador): ?>
            <tr>

                <td>
                    <?= htmlspecialchars($jogador['nome']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($jogador['posicao']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($jogador['numeroCamisa']) ?>
                </td>

                <td class="actions">

                    <a class="edit"
                       href="index.php?action=editarJogador&id=<?= $jogador['id'] ?>">
                       Editar
                    </a>

                    <a href="javascript:void(0)" class="delete"
                       onclick="openDeleteModal('<?= $jogador['id'] ?>','<?= htmlspecialchars($jogador['nome']) ?>')">
                        Apagar
                    </a>

                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="4">
                Nenhum jogador cadastrado para essa seleção ainda.
            </td>
        </tr>
    <?php endif; ?>
</table>

<button onclick="window.location.href='index.php?action=listar'" 
        class="btn_voltar">
    Voltar para a listagem
</button>

<div class="paginacao">

    <?php if ($pagina > 1): ?>
        <a class="pag-btn"
           href="index.php?action=elenco&id=<?= $selecao['id'] ?>&pagina=<?= $pagina - 1 ?>">
           « Anterior
        </a>
    <?php endif; ?>

    <?php
    $inicio = max(1, $pagina - 2);
    $fim = min($totalPaginas, $pagina + 2);
    for ($i = $inicio; $i <= $fim; $i++):
    ?>
        <a class="pag-btn <?= $i == $pagina ? 'ativo' : '' ?>"
           href="index.php?action=elenco&id=<?= $selecao['id'] ?>&pagina=<?= $i ?>">
           <?= $i ?>
        </a>
    <?php endfor; ?>

    <?php if ($pagina < $totalPaginas): ?>
        <a class="pag-btn"
           href="index.php?action=elenco&id=<?= $selecao['id'] ?>&pagina=<?= $pagina + 1 ?>">
           Próxima »
        </a>
    <?php endif; ?>

</div>

<!-- MODAL -->
<div id="deleteModal" class="modal-overlay" style="display:none;">
    <div class="modal-content">
        <h3>Confirmar Exclusão</h3>
        <p>Tem certeza que deseja excluir <strong id="itemName"></strong>?</p>

        <div class="modal-buttons">
            <button onclick="closeDeleteModal()" class="btn-cancel">
                Cancelar
            </button>

            <a id="confirmDeleteBtn"
               href="#"
               class="btn-confirm-delete">
               Excluir
            </a>
        </div>
    </div>
</div>

<script src="main.js"></script>

</body>
</html>