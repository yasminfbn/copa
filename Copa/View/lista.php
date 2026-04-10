<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleção</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { padding: 10px; text-align: left; border: 1px solid #ddd; }
        img { width: 40px; height: 30px; object-fit: cover; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <table>
        <tbody>
            <?php foreach($listas as $lista): ?>
                <tr>
                    <td>
                        <?php if(isset($lista['bandeira']) && file_exists($lista['bandeira'])): ?>
                            <img src="<?= htmlspecialchars($lista['bandeira']) ?>" alt="Bandeira">
                        <?php else: ?>
                            Sem bandeira
                        <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars($lista['grupo']) ?></td>
                    <td><?= htmlspecialchars($lista['nome']) ?></td>
                    <td><?= htmlspecialchars($lista['titulos']) ?></td>
                    
                    <a href="?action=editar&id=<?= $lista['id'] ?>" title="Editar">
                        <i class="fas fa-edit edit"></i>
                    </a>
                    <a href="?action=deletar&id=<?= $lista['id'] ?>" 
                       onclick="return confirm('Excluir <?= $lista['nome'] ?>?')" title="Excluir">
                        <i class="fas fa-trash delete"></i>
                    </a>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>