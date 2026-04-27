

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
        <div class="<?= $_GET['status'] === 'sucesso' || strpos($_GET['status'], 'atualizado') !== false ? 'success' : 'error' ?>">
            <?= htmlspecialchars($_GET['msg'] ?? $_GET['status']) ?>
        </div>
    <?php endif; ?>


    <h1 class="title"> Seleções da Copa</h1>  
    <button id="toggleTheme" style="position:fixed; top:20px; right:20px; padding:10px 15px; border:none; border-radius:6px; cursor:pointer;">
        🌙
    </button>
    <p><a href="?action=novo" class="btn_novaSelecao">Nova Seleção</a></p>
    
    <div class="filtrocontainer">
        <form action="index.php" method="GET" class="filter-form">
            <input type="hidden" name="action" value="listar">
            <select name="grupo" id="grupo" onchange="this.form.submit()">
                <option value="">Todos</option>
                <option value="A" <?= ($_GET['grupo']??'')=='A'?'selected':'' ?>>Grupo A</option>
                <option value="B" <?= ($_GET['grupo']??'')=='B'?'selected':'' ?>>Grupo B</option>
                <option value="C" <?= ($_GET['grupo']??'')=='C'?'selected':'' ?>>Grupo C</option>
                <option value="D" <?= ($_GET['grupo']??'')=='D'?'selected':'' ?>>Grupo D</option>
                <option value="E" <?= ($_GET['grupo']??'')=='E'?'selected':'' ?>>Grupo E</option>
                <option value="F" <?= ($_GET['grupo']??'')=='F'?'selected':'' ?>>Grupo F</option>
                <option value="G" <?= ($_GET['grupo']??'')=='G'?'selected':'' ?>>Grupo G</option>
                <option value="H" <?= ($_GET['grupo']??'')=='H'?'selected':'' ?>>Grupo H</option>
                <option value="I" <?= ($_GET['grupo']??'')=='I'?'selected':'' ?>>Grupo I</option>
                <option value="J" <?= ($_GET['grupo']??'')=='J'?'selected':'' ?>>Grupo J</option>
                <option value="K" <?= ($_GET['grupo']??'')=='K'?'selected':'' ?>>Grupo K</option>
                <option value="L" <?= ($_GET['grupo']??'')=='L'?'selected':'' ?>>Grupo L</option>
            </select>
            <button type="submit">Filtrar</button>
            <?php if ($_GET['grupo'] ?? ''): ?>
            <a href="index.php" class="btn-clear">Limpar</a>
            <?php endif; ?>
        </form>
            </div>
            <div class="dashboard-mini">
                <div class="card-mini">
                    <span>Total de Seleções</span>
                    <strong><?= $totalSelecoes ?></strong>
                </div>

                <div class="card-mini">
                    <span>Total de Títulos</span>
                    <strong><?= $totalTitulos ?></strong>
                </div>

                <div class="card-mini">
                    <span>Grupos</span>
                    <strong><?= count($selecoesPorGrupo ?? []) ?></strong>
                </div>
            </div>

    <?php if (!empty($listas ?? [])): ?>
        <table>
            <thead>
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
                    <tr>
                        <td>
                            <?php if(!empty($lista['bandeira'])): ?>
                                <img src="<?= htmlspecialchars($lista['bandeira']) ?>" alt="Bandeira" style="width:50px;height:38px;">
                            <?php else: ?>
                                <span style="color:#999;font-size:24px;">Não foi adicionado bandeira</span>
                            <?php endif; ?>
                        </td>
                        <td><strong><?= htmlspecialchars($lista['grupo'] ?? '-') ?></strong></td>
                        <td><?= htmlspecialchars($lista['nome'] ?? '-') ?></td>
                        <td><?= htmlspecialchars($lista['titulos'] ?? '-') ?></td>
                        <td class="actions">
                            <div class="kebab-menu">
                                <button class="kebab-btn" type="button" onclick="toggleMenu(<?= $lista['id'] ?>)">
                                    ⋮
                                </button>

                                <div class="kebab-menu-list" id="menu-<?= $lista['id'] ?>" hidden>
                                    <a href="?action=editar&id=<?= $lista['id'] ?>">Editar</a>
                                    <a href="javascript:void(0)" 
                                    onclick="openDeleteModal('<?= $lista['id'] ?>', '<?= htmlspecialchars($lista['nome'] ?? '') ?>')">
                                        Excluir
                                    </a>
                                    <a href="index.php?action=elenco&id=<?= $lista['id'] ?>">Ver Elenco</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="empty">
            <h2><?= ($_GET['grupo']??'') ? 'Nenhuma seleção no Grupo '.htmlspecialchars($_GET['grupo']) : 'Nenhuma seleção cadastrada' ?></h2>
            <p><a href="?action=novo">Cadastre a primeira seleção</a></p>
        </div>
    <?php endif; ?>
    

<div class="paginacao" style="text-align:center;margin:30px 0;">
        <?php if($pagina > 1): ?>
            <a href="?action=listar&grupo=<?= urlencode($grupo) ?>&pagina=<?= $pagina-1 ?>" 
               class="pag-btn" style="background:#00a6fb;">« Anterior</a>
        <?php endif; ?>
        
        <?php 
        $inicio = max(1, $pagina - 2);
        $fim = min($totalPaginas, $pagina + 2);
        
        for($i = $inicio; $i <= $fim; $i++): 
        ?>
            <a href="?action=listar&grupo=<?= urlencode($grupo) ?>&pagina=<?= $i ?>" 
               class="pag-btn <?= $i==$pagina ? 'ativo' : '' ?>">
               <?= $i ?>
            </a>
        <?php endfor; ?>
        
        <?php if($pagina < $totalPaginas): ?>
            <a href="?action=listar&grupo=<?= urlencode($grupo) ?>&pagina=<?= $pagina+1 ?>" 
               class="pag-btn" style="background:#00a6fb;">Próxima »</a>
        <?php endif; ?>
        

    </div>
        <div id="deleteModal" class="modal-overlay" style="display: none;">
        <div class="modal-content">
            <h3>Confirmar Exclusão</h3>
            <p>Você tem certeza que deseja excluir <strong id="itemName"></strong>?</p>
            <div class="modal-buttons">
                <button onclick="closeDeleteModal()" class="btn-cancel">Cancelar</button>
                <a id="confirmDeleteBtn" href="#" class="btn-confirm-delete">Excluir</a>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mensagens = document.querySelectorAll('.success, .error');
            mensagens.forEach(function(msg) {
                setTimeout(function() {
                    msg.classList.add('fadeOut');
                    setTimeout(function() { if (msg.parentNode) msg.parentNode.removeChild(msg); }, 500);
                }, 2000);
            });
        });
        function toggleMenu(id) {
            const menu = document.getElementById('menu-' + id);
            if (!menu) return;

            const isHidden = menu.hasAttribute('hidden');

            document.querySelectorAll('.kebab-menu-list').forEach(m => m.setAttribute('hidden', true));

            if (isHidden) {
                menu.removeAttribute('hidden');
            }
        }

        document.addEventListener('click', function(e) {
            if (!e.target.closest('.kebab-menu')) {
                document.querySelectorAll('.kebab-menu-list').forEach(m => m.setAttribute('hidden', true));
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const mensagens = document.querySelectorAll('.success, .error');
            mensagens.forEach(function(msg) {
                setTimeout(function() {
                    msg.classList.add('fadeOut');
                    setTimeout(function() { if (msg.parentNode) msg.parentNode.removeChild(msg); }, 500);
                }, 2000);
            });
        });
        function openDeleteModal(id, nome) {
            const modal = document.getElementById('deleteModal');
            const confirmBtn = document.getElementById('confirmDeleteBtn');
            const nameSpan = document.getElementById('itemName');

            // Define o nome da seleção no texto do modal
            nameSpan.innerText = nome;
            
            // Define o link correto para deletar
            confirmBtn.href = "?action=deletar&id=" + id;

            // Mostra o modal
            modal.style.display = 'flex';
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }

        // Fechar se clicar fora da caixa branca
        window.onclick = function(event) {
            const modal = document.getElementById('deleteModal');
            if (event.target == modal) {
                closeDeleteModal();
            }
        }
        
</script>
</body>
</html>