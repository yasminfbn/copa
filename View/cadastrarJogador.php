<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Jogador</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="/assets/icone.png">
    <link href="https://fonts.cdnfonts.com/css/snaps-taste-outline" rel="stylesheet">  
    <link href="https://fonts.cdnfonts.com/css/ebuenaclassic" rel="stylesheet">
                
</head>

<body>

<div class="content">
    <h1 class="AdicionarSelecao">Adicionar Jogador</h1>

    <label class="theme-switch">
            <input type="checkbox" id="toggleTheme"
                   onclick="falarSistema('Alternando tema')">
            <span class="slider"></span>
    </label>>

    <form class="forms_create" method="POST" action="index.php?action=adicionarJogador&id=<?= $selecao['id'] ?>">

        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" placeholder="João Silva" required autocomplete="off"
                   onclick="falarTexto('Nome do jogador')">
        </div>

        <div class="form-group">
            <label>Posição do jogador:</label>
            <input type="text" name="posicao" placeholder="ex: Goleiro" required autocomplete="off"
                   onclick="falarTexto('Posição do jogador')">
        </div>

        <div class="form-group">
            <label>Número da camisa:</label>
            <input type="number" name="numeroCamisa" min="0" placeholder="ex: 05" required autocomplete="off"
                   onclick="falarTexto('Número da camisa')">
        </div>

        <button type="submit" class="btn-save"
                onclick="falarTexto('Salvando jogador')">
            Salvar Jogador
        </button>

    </form>
</div>

<script src="main.js"></script>

</body>
</html>