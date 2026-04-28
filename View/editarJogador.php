<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Jogador</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="/assets/icone.png">
    <link href="https://fonts.cdnfonts.com/css/snaps-taste-outline" rel="stylesheet">
</head>
<body>

<div class="content">
    <h1 class="AdicionarSelecao">Editar Jogador</h1>

    <label class="theme-switch">
        <input type="checkbox" id="toggleTheme">
        <span class="slider"></span>
    </label>

    <form method="POST" action="index.php?action=atualizarJogador">

        <input type="hidden" name="id" value="<?= htmlspecialchars($jogador['id'] ?? '') ?>">

        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome"
                   value="<?= htmlspecialchars($jogador['nome'] ?? '') ?>"
                   required autocomplete="off">
        </div>

        <div class="form-group">
            <label>Posição do jogador:</label>
            <input type="text" name="posicao"
                   value="<?= htmlspecialchars($jogador['posicao'] ?? '') ?>"
                   required autocomplete="off">
        </div>

        <div class="form-group">
            <label>Número da camisa:</label>
            <input type="number" name="numeroCamisa"
                   min="0"
                   value="<?= htmlspecialchars($jogador['numeroCamisa'] ?? '') ?>"
                   required autocomplete="off">
        </div>

        <button type="submit" class="btn-save">
            Salvar Alterações
        </button>

        <a href="index.php?action=elenco&id=<?= $jogador['selecao_id'] ?>"
           class="btn-cancel">
           Cancelar
        </a>

    </form>
</div>

<script src="main.js"></script>

</body>
</html>