

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.cdnfonts.com/css/fear" rel="stylesheet">
    <title>Seleções</title>
</head>
<body>
    <?php if (isset($_GET['status'])): ?>
        <div class="<?= $_GET['status'] === 'sucesso' || strpos($_GET['status'], 'atualizado') !== false ? 'success' : 'error' ?>">
            <?= htmlspecialchars($_GET['msg'] ?? $_GET['status']) ?>
        </div>
    <?php endif; ?>

    <h1 class="title">Seleções da Copa</h1>
    <p><a href="?action=novo" style="background:#0582ca;color:white;padding:10px 20px;text-decoration:none;border-radius:5px;">Nova Seleção</a></p>
    
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
            </select>
            <button type="submit">Filtrar</button>
            <?php if ($_GET['grupo'] ?? ''): ?>
            <a href="index.php" class="btn-clear">Limpar</a>
            <?php endif; ?>
        </form>
    </div>

    <?php if (!empty($listas ?? [])): ?>
        <table>
            <thead>
                <tr>
                    <th>Bandeira</th>
                    <th>Grupo</th>
                    <th>Nome</th>
                    <th>Títulos</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($listas as $lista): ?>
                    <tr>
                        <td>
                            <?php if(!empty($lista['bandeira'])): ?>
                                <img src="<?= htmlspecialchars($lista['bandeira']) ?>" alt="Bandeira" style="width:50px;height:38px;">
                            <?php else: ?>
                                <span style="color:#999;font-size:24px;">⚽</span>
                            <?php endif; ?>
                        </td>
                        <td><strong><?= htmlspecialchars($lista['grupo'] ?? '-') ?></strong></td>
                        <td><?= htmlspecialchars($lista['nome'] ?? '-') ?></td>
                        <td><?= htmlspecialchars($lista['titulos'] ?? '-') ?></td>
                        <td class="actions">
                            <a href="?action=editar&id=<?= $lista['id'] ?>" class="edit">Editar</a>
                            <a href="?action=deletar&id=<?= $lista['id'] ?>" class="delete" onclick="return confirm('Excluir <?= htmlspecialchars($lista['nome'] ?? '') ?>?')">Excluir</a>
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
    </script>

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
        
        <span style="margin-left:20px;color:#666;">
            Página <?= $pagina ?> de <?= $totalPaginas ?> (<?= $total ?> total)
        </span>
    </div>
</body>
</html>