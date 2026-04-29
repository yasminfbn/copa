<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Seleção</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="/assets/icone.png">
    <link href="https://fonts.cdnfonts.com/css/snaps-taste-outline" rel="stylesheet">  
    <link href="https://fonts.cdnfonts.com/css/ebuenaclassic" rel="stylesheet">
                
</head>

<body>

<div class="content">
    <h1 class="AdicionarSelecao">Adicionar Seleção</h1>
    <label class="theme-switch">
            <input type="checkbox" id="toggleTheme"
                   onclick="falarSistema('Alternando tema')">
            <span class="slider"></span>
        </label>

    <form method="POST" action="?action=salvar">

        <div class="form-group">
            <label>Grupo:</label>
            <input type="text" name="grupo" maxlength="1" placeholder="ex: A" required autocomplete="off">
        </div>

        <div class="form-group">
            <label>Nome da Seleção:</label>
            <input type="text" name="nome" placeholder="ex: Brasil" required autocomplete="off">
        </div>

        <div class="form-group">
            <label>Títulos:</label>
            <input type="number" name="titulos" min="0" placeholder="ex: 5" required autocomplete="off">
        </div>

        <div class="form-group">
            <label>Bandeira:</label>
            <select name="bandeira">
                <option value="">Selecione</option>
                <option value="assets/africa_do_sul.jpg">🇿🇦 Seleção Sul-Africana</option>
                <option value="assets/alemanha.jpg">🇩🇪 Seleção Alemã</option>
                <option value="assets/arabia_saudita.jpg">🇸🇦 Seleção Saudita</option>
                <option value="assets/argentina.jpg">🇦🇷 Seleção Argentina</option>
                <option value="assets/australia.jpg">🇦🇺 Seleção Australiana</option>
                <option value="assets/belgica.jpg">🇧🇪 Seleção Belga</option>
                <option value="assets/brasileira.jpg">🇧🇷 Seleção Brasileira</option>
                <option value="assets/canada.jpg">🇨🇦 Seleção Canadense</option>
                <option value="assets/catar.jpg">🇶🇦 Seleção Catariana</option>
                <option value="assets/colombia.jpg">🇨🇴 Seleção Colombiana</option>
                <option value="assets/coreia_do_sul.jpg">🇰🇷 Seleção Sul-Coreana</option>
                <option value="assets/costa_rica.jpg">🇨🇷 Seleção Costarriquenha</option>
                <option value="assets/croacia.jpg">🇭🇷 Seleção Croata</option>
                <option value="assets/curacao.jpg">🇨🇼 Seleção Curacaoense</option>
                <option value="assets/dinamarca.jpg">🇩🇰 Seleção Dinamarquesa</option>
                <option value="assets/equador.jpg">🇪🇨 Seleção Equatoriana</option>
                <option value="assets/espanha.jpg">🇪🇸 Seleção Espanhola</option>
                <option value="assets/EstadosUnidos.jpg">🇺🇸 Seleção dos Estados Unidos</option>
                <option value="assets/franca.jpg">🇫🇷 Seleção Francesa</option>
                <option value="assets/inglaterra.jpg">🇬🇧 Seleção Inglesa</option>
                <option value="assets/irlanda_do_norte.jpg">🇬🇧 Seleção Norte-Irlandesa</option>
                <option value="assets/italia.jpg">🇮🇹 Seleção Italiana</option>
                <option value="assets/japao.jpg">🇯🇵 Seleção Japonesa</option>
                <option value="assets/jamaica.jpg">🇯🇲 Seleção Jamaicana</option>
                <option value="assets/marrocos.jpg">🇲🇦 Seleção Marroquina</option>
                <option value="assets/Mexico.jpg">🇲🇽 Seleção Mexicana</option>
                <option value="assets/nigeria.jpg">🇳🇬 Seleção Nigeriana</option>
                <option value="assets/nova_zelandia.jpg">🇳🇿 Seleção Neozelandesa</option>
                <option value="assets/panama.jpg">🇵🇦 Seleção Panamenha</option>
                <option value="assets/paraguai.jpg">🇵🇾 Seleção Paraguaia</option>
                <option value="assets/peru.jpg">🇵🇪 Seleção Peruana</option>
                <option value="assets/argelia.jpg">🇩🇿 Seleção Argelina</option>
                <option value="assets/escocia.jpg">🏴 Seleção Escocesa</option>
                <option value="assets/serbia.jpg">🇷🇸 Seleção Sérvia</option>
                <option value="assets/suica.jpg">🇨🇭 Seleção Suíça</option>
                <option value="assets/tunisia.jpg">🇹🇳 Seleção Tunisiana</option>
                <option value="assets/uruguai.jpg">🇺🇾 Seleção Uruguaia</option>
                <option value="assets/uzbequistao.jpg">🇺🇿 Seleção Uzbeque</option>
                <option value="assets/vietna.jpg">🇻🇳 Seleção Vietnamita</option>
                <option value="assets/suecia.jpg">🇸🇪 Seleção Sueca</option>
                <option value="assets/polonia.jpg">🇵🇱 Seleção Polonesa</option>
                <option value="assets/romenia.jpg">🇷🇴 Seleção Romena</option>
                <option value="assets/grecia.jpg">🇬🇷 Seleção Grega</option>
                <option value="assets/turquia.jpg">🇹🇷 Seleção Turca</option>
                <option value="assets/hungria.jpg">🇭🇺 Seleção Húngara</option>
                <option value="assets/ghana.jpg">🇬🇭 Seleção Ganesa</option>
                <option value="assets/camaroes.jpg">🇨🇲 Seleção Camaronesa</option>
            </select>
        </div>

        <button type="submit" class="btn-save">Salvar Seleção</button>
        <a href="index.php" class="btn-cancel">Cancelar</a>

    </form>
</div>
<script src="main.js"></script>

</body>
</html>