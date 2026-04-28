<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="/assets/icone.png">
    <link href="https://fonts.cdnfonts.com/css/snaps-taste-outline" rel="stylesheet">           
    <title>Seleções da Copa</title>
</head>

<body>

<?php if (isset($_GET['status'])): ?>
    <div class="<?= $_GET['status'] === 'sucesso' || strpos($_GET['status'], 'atualizado') !== false ? 'success' : 'error' ?>"
         onclick="falarSistema('Mensagem do sistema')">
        <?= htmlspecialchars($_GET['msg'] ?? $_GET['status']) ?>
    </div>
<?php endif; ?>


<h1 class="title"
    onclick="falarSistema('Seleções da Copa')">
    Seleções da Copa
</h1>  

<label class="theme-switch">
    <input type="checkbox" id="toggleTheme" onclick="falarSistema('Alternando tema')">
    <span class="slider"></span>
</label>

<p>
    <a href="?action=novo"
       class="btn_novaSelecao"
       onclick="falarSistema('Criando nova seleção')">
       Nova Seleção
    </a>
</p>


<div class="filtrocontainer"
     onclick="falarSistema('Filtro de grupos')">

    <form action="index.php" method="GET" class="filter-form">
        <input type="hidden" name="action" value="listar">

        <select name="grupo" id="grupo"
                onchange="falarSistema('Grupo selecionado ' + this.value); this.form.submit()">

            <option value="">Todos</option>
            <option value="A">Grupo A</option>
            <option value="B">Grupo B</option>
            <option value="C">Grupo C</option>
            <option value="D">Grupo D</option>
            <option value="E">Grupo E</option>
            <option value="F">Grupo F</option>
            <option value="G">Grupo G</option>
            <option value="H">Grupo H</option>
            <option value="I">Grupo I</option>
            <option value="J">Grupo J</option>
            <option value="K">Grupo K</option>
            <option value="L">Grupo L</option>
        </select>

        <button type="submit"
                onclick="falarSistema('Filtrando resultados')">
            Filtrar
        </button>

        <?php if ($_GET['grupo'] ?? ''): ?>
            <a href="index.php"
               class="btn-clear"
               onclick="falarSistema('Limpando filtro')">
               Limpar
            </a>
        <?php endif; ?>
    </form>
</div>


<div class="dashboard-mini">

    <div class="card-mini"
         onclick="falarSistema('Total de seleções <?= $totalSelecoes ?>')">
        <span>Total de Seleções</span>
        <strong><?= $totalSelecoes ?></strong>
    </div>

    <div class="card-mini"
         onclick="falarSistema('Total de títulos <?= $totalTitulos ?>')">
        <span>Total de Títulos</span>
        <strong><?= $totalTitulos ?></strong>
    </div>

    <div class="card-mini"
         onclick="falarSistema('Grupos cadastrados')">
        <span>Grupos</span>
        <strong><?= count($selecoesPorGrupo ?? []) ?></strong>
    </div>

</div>


<?php if (!empty($listas ?? [])): ?>
<table>

    <thead onclick="falarSistema('Tabela de seleções')">
        <tr>
            <th>Bandeira</th>
            <th>Grupo</th>
            <th>Nome</th>
            <th>Títulos</th>
            <th></th>
        </tr>
    </thead>

    <tbody>

    <?php foreach($listas as $lista): ?>
        <tr onclick="falarSistema('Seleção <?= $lista['nome'] ?>')">

            <td>
                <?php if(!empty($lista['bandeira'])): ?>
                    <img src="<?= htmlspecialchars($lista['bandeira']) ?>"
                         onclick="falarSistema('Bandeira da seleção')"
                         style="width:50px;height:38px;">
                <?php else: ?>
                    <span onclick="falarSistema('Sem bandeira')">
                        Não foi adicionado bandeira
                    </span>
                <?php endif; ?>
            </td>

            <td onclick="falarSistema('Grupo <?= $lista['grupo'] ?>')">
                <strong><?= htmlspecialchars($lista['grupo'] ?? '-') ?></strong>
            </td>

            <td onclick="falarSistema('Seleção <?= $lista['nome'] ?>')">
                <?= htmlspecialchars($lista['nome'] ?? '-') ?>
            </td>

            <td onclick="falarSistema('<?= $lista['titulos'] ?> títulos')">
                <?= htmlspecialchars($lista['titulos'] ?? '-') ?>
            </td>

            <td class="actions">

                <div class="kebab-menu">

                    <button class="kebab-btn"
                            onclick="falarSistema('Abrindo menu'); toggleMenu(<?= $lista['id'] ?>)">
                        ⋮
                    </button>

                    <div class="kebab-menu-list"
                         id="menu-<?= $lista['id'] ?>" hidden>

                        <a href="?action=editar&id=<?= $lista['id'] ?>"
                           onclick="falarSistema('Editar seleção')">
                           Editar
                        </a>

                        <a href="javascript:void(0)"
                           onclick="falarSistema('Excluir seleção'); openDeleteModal('<?= $lista['id'] ?>', '<?= htmlspecialchars($lista['nome']) ?>')">
                           Excluir
                        </a>

                        <a href="index.php?action=elenco&id=<?= $lista['id'] ?>"
                           onclick="falarSistema('Ver elenco')">
                           Ver Elenco
                        </a>

                    </div>

                </div>

            </td>

        </tr>
    <?php endforeach; ?>

    </tbody>

</table>
<?php else: ?>
    <div class="empty"
         onclick="falarSistema('Nenhuma seleção encontrada')">
        <h2>Nenhuma seleção cadastrada</h2>
        <p><a href="?action=novo">Cadastre a primeira seleção</a></p>
    </div>
<?php endif; ?>


<!-- PAGINAÇÃO CORRIGIDA -->
<?php
$inicio = max(1, $pagina - 2);
$fim = min($totalPaginas, $pagina + 2);
?>

<div class="paginacao">

<?php if($pagina > 1): ?>
    <a class="pag-btn"
       onclick="falarSistema('Página anterior')"
       href="?action=listar&grupo=<?= urlencode($grupo) ?>&pagina=<?= $pagina-1 ?>">
       « Anterior
    </a>
<?php endif; ?>

<?php for($i = $inicio; $i <= $fim; $i++): ?>
    <a class="pag-btn <?= $i==$pagina ? 'ativo' : '' ?>"
       onclick="falarSistema('Página <?= $i ?>')"
       href="?action=listar&grupo=<?= urlencode($grupo) ?>&pagina=<?= $i ?>">
       <?= $i ?>
    </a>
<?php endfor; ?>

<?php if($pagina < $totalPaginas): ?>
    <a class="pag-btn"
       onclick="falarSistema('Próxima página')"
       href="?action=listar&grupo=<?= urlencode($grupo) ?>&pagina=<?= $pagina+1 ?>">
       Próxima »
    </a>
<?php endif; ?>

</div>


<!-- MODAL -->
<div id="deleteModal" class="modal-overlay" style="display: none;"
     onclick="falarSistema('Modal de exclusão')">

    <div class="modal-content">

        <h3 onclick="falarSistema('Confirmar exclusão')">
            Confirmar Exclusão
        </h3>

        <p>Você tem certeza que deseja excluir <strong id="itemName"></strong>?</p>

        <div class="modal-buttons">

            <button onclick="falarSistema('Cancelar'); closeDeleteModal()"
                    class="btn-cancel">
                Cancelar
            </button>

            <a id="confirmDeleteBtn"
               class="btn-confirm-delete"
               onclick="falarSistema('Confirmando exclusão')">
               Excluir
            </a>

        </div>

    </div>

</div>


<button onclick="toggleAudio(); falarSistema('Ativando narração')"
        class="btn_novaSelecao">
    Ativar Narração
</button>


<script src="main.js"></script>
</body>
</html>