<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar informações</title>

    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="/assets/icone.png">
    <link href="https://fonts.cdnfonts.com/css/snaps-taste-outline" rel="stylesheet">  
    <link href="https://fonts.cdnfonts.com/css/ebuenaclassic" rel="stylesheet">
                
</head>

<body>

<div class="content">

    <h1 class="AdicionarSelecao">Editar Seleção</h1>

    <form method="POST" action="?action=atualizar">

        <input type="hidden" name="id" value="<?= htmlspecialchars($lista['id'] ?? '') ?>">

        <div class="form-group">
            <label>Grupo:</label>
            <input type="text" name="grupo" maxlength="1"
                   placeholder="ex: A"
                   required autocomplete="off"
                   value="<?= htmlspecialchars($lista['grupo'] ?? '') ?>">
        </div>

        <div class="form-group">
            <label>Nome da Seleção:</label>
            <input type="text" name="nome"
                   placeholder="ex: Brasil"
                   required autocomplete="off"
                   value="<?= htmlspecialchars($lista['nome'] ?? '') ?>">
        </div>

        <div class="form-group">
            <label>Títulos:</label>
            <input type="number" name="titulos" min="0"
                   placeholder="ex: 5"
                   required autocomplete="off"
                   value="<?= htmlspecialchars($lista['titulos'] ?? '') ?>">
        </div>

        <div class="form-group">
            <label>Bandeira:</label>
            <select name="bandeira" onchange="falar('assets/audio/bandeira.mp3')">

                <option value="">Selecione</option>

                <option value="assets/africa_do_sul.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/africa_do_sul.jpg' ? 'selected' : '' ?>>🇿🇦 Seleção Sul-Africana</option>
                <option value="assets/alemanha.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/alemanha.jpg' ? 'selected' : '' ?>>🇩🇪 Seleção Alemã</option>
                <option value="assets/arabia_saudita.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/arabia_saudita.jpg' ? 'selected' : '' ?>>🇸🇦 Seleção Saudita</option>
                <option value="assets/argentina.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/argentina.jpg' ? 'selected' : '' ?>>🇦🇷 Seleção Argentina</option>
                <option value="assets/australia.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/australia.jpg' ? 'selected' : '' ?>>🇦🇺 Seleção Australiana</option>
                <option value="assets/belgica.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/belgica.jpg' ? 'selected' : '' ?>>🇧🇪 Seleção Belga</option>
                <option value="assets/brasileira.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/brasileira.jpg' ? 'selected' : '' ?>>🇧🇷 Seleção Brasileira</option>
                <option value="assets/canada.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/canada.jpg' ? 'selected' : '' ?>>🇨🇦 Seleção Canadense</option>
                <option value="assets/catar.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/catar.jpg' ? 'selected' : '' ?>>🇶🇦 Seleção Catariana</option>
                <option value="assets/colombia.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/colombia.jpg' ? 'selected' : '' ?>>🇨🇴 Seleção Colombiana</option>
                <option value="assets/coreia_do_sul.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/coreia_do_sul.jpg' ? 'selected' : '' ?>>🇰🇷 Seleção Sul-Coreana</option>
                <option value="assets/costa_rica.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/costa_rica.jpg' ? 'selected' : '' ?>>🇨🇷 Seleção Costarriquenha</option>
                <option value="assets/croacia.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/croacia.jpg' ? 'selected' : '' ?>>🇭🇷 Seleção Croata</option>
                <option value="assets/curacao.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/curacao.jpg' ? 'selected' : '' ?>>🇨🇼 Seleção Curacaoense</option>
                <option value="assets/dinamarca.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/dinamarca.jpg' ? 'selected' : '' ?>>🇩🇰 Seleção Dinamarquesa</option>
                <option value="assets/equador.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/equador.jpg' ? 'selected' : '' ?>>🇪🇨 Seleção Equatoriana</option>
                <option value="assets/espanha.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/espanha.jpg' ? 'selected' : '' ?>>🇪🇸 Seleção Espanhola</option>
                <option value="assets/EstadosUnidos.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/EstadosUnidos.jpg' ? 'selected' : '' ?>>🇺🇸 Seleção dos Estados Unidos</option>
                <option value="assets/franca.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/franca.jpg' ? 'selected' : '' ?>>🇫🇷 Seleção Francesa</option>
                <option value="assets/inglaterra.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/inglaterra.jpg' ? 'selected' : '' ?>>🇬🇧 Seleção Inglesa</option>
                <option value="assets/irlanda_do_norte.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/irlanda_do_norte.jpg' ? 'selected' : '' ?>>🇬🇧 Seleção Norte-Irlandesa</option>
                <option value="assets/italia.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/italia.jpg' ? 'selected' : '' ?>>🇮🇹 Seleção Italiana</option>
                <option value="assets/japao.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/japao.jpg' ? 'selected' : '' ?>>🇯🇵 Seleção Japonesa</option>
                <option value="assets/jamaica.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/jamaica.jpg' ? 'selected' : '' ?>>🇯🇲 Seleção Jamaicana</option>
                <option value="assets/marrocos.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/marrocos.jpg' ? 'selected' : '' ?>>🇲🇦 Seleção Marroquina</option>
                <option value="assets/Mexico.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/Mexico.jpg' ? 'selected' : '' ?>>🇲🇽 Seleção Mexicana</option>
                <option value="assets/nigeria.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/nigeria.jpg' ? 'selected' : '' ?>>🇳🇬 Seleção Nigeriana</option>
                <option value="assets/nova_zelandia.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/nova_zelandia.jpg' ? 'selected' : '' ?>>🇳🇿 Seleção Neozelandesa</option>
                <option value="assets/panama.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/panama.jpg' ? 'selected' : '' ?>>🇵🇦 Seleção Panamenha</option>
                <option value="assets/paraguai.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/paraguai.jpg' ? 'selected' : '' ?>>🇵🇾 Seleção Paraguaia</option>
                <option value="assets/peru.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/peru.jpg' ? 'selected' : '' ?>>🇵🇪 Seleção Peruana</option>
                <option value="assets/argelia.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/argelia.jpg' ? 'selected' : '' ?>>🇩🇿 Seleção Argelina</option>
                <option value="assets/escocia.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/escocia.jpg' ? 'selected' : '' ?>>🏴 Seleção Escocesa</option>
                <option value="assets/serbia.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/serbia.jpg' ? 'selected' : '' ?>>🇷🇸 Seleção Sérvia</option>
                <option value="assets/suica.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/suica.jpg' ? 'selected' : '' ?>>🇨🇭 Seleção Suíça</option>
                <option value="assets/tunisia.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/tunisia.jpg' ? 'selected' : '' ?>>🇹🇳 Seleção Tunisiana</option>
                <option value="assets/uruguai.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/uruguai.jpg' ? 'selected' : '' ?>>🇺🇾 Seleção Uruguaia</option>
                <option value="assets/uzbequistao.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/uzbequistao.jpg' ? 'selected' : '' ?>>🇺🇿 Seleção Uzbeque</option>
                <option value="assets/vietna.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/vietna.jpg' ? 'selected' : '' ?>>🇻🇳 Seleção Vietnamita</option>
                <option value="assets/suecia.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/suecia.jpg' ? 'selected' : '' ?>>🇸🇪 Seleção Sueca</option>
                <option value="assets/polonia.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/polonia.jpg' ? 'selected' : '' ?>>🇵🇱 Seleção Polonesa</option>
                <option value="assets/romenia.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/romenia.jpg' ? 'selected' : '' ?>>🇷🇴 Seleção Romena</option>
                <option value="assets/grecia.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/grecia.jpg' ? 'selected' : '' ?>>🇬🇷 Seleção Grega</option>
                <option value="assets/turquia.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/turquia.jpg' ? 'selected' : '' ?>>🇹🇷 Seleção Turca</option>
                <option value="assets/hungria.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/hungria.jpg' ? 'selected' : '' ?>>🇭🇺 Seleção Húngara</option>
                <option value="assets/ghana.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/ghana.jpg' ? 'selected' : '' ?>>🇬🇭 Seleção Ganesa</option>
                <option value="assets/camaroes.jpg" <?= ($lista['bandeira'] ?? '') == 'assets/camaroes.jpg' ? 'selected' : '' ?>>🇨🇲 Seleção Camaronesa</option>

            </select>
        </div>

        <button type="submit" class="btn-save" onclick="falar('assets/audio/salvar.mp3')">
            Salvar Seleção
        </button>

        <a href="index.php" class="btn-cancel" onclick="falar('assets/audio/cancelar.mp3')">
            Cancelar
        </a>

    </form>
</div>
<script src="main.js"></script>


</body>
</html>