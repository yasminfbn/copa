<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar infromações</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.cdnfonts.com/css/fear" rel="stylesheet">
</head>
<body>
<div class="content">
    <h1 class="AdicionarSelecao">Editar Seleção</h1>

        <form method="POST" action="?action=salvar">
            <div class="form-group">
                <label>Grupo: </label>
                <input type="text" name="grupo" maxlength="1" placeholder="ex: A" required autocomplete="off"> <br>
            </div>

            <div class="form-group">
                <label>Nome da Seleção: </label>
                <input type="text" name="nome" placeholder="ex: Brasil" required autocomplete="off"><br> 

            <div class="form-group">
                <label>Títulos: </label>
                <input type="number" name="titulos" min="0" placeholder="ex: 5" required autocomplete="off"><br>
            </div>

            <div class="form-group">
                <label>Bandeira: </label>
                <select name="bandeira">
                    <option value="">Selecione</option>
                    <option value="assets/brasil.jpg">🇧🇷 Brasil</option>
                    <option value="assets/argentina.jpg">🇦🇷 Argentina</option>
                    <option value="assets/canada.jpg">🇨🇦 Canadá</option>
                    <option value="assets/colombia.jpg">🇨🇴 Colômbia</option>
                    <option value="assets/curacao.jpg">🇨🇼 Curaçao</option>
                    <option value="assets/equador.jpg">🇪🇨 Equador</option>
                    <option value="assets/EstadosUnidos.jpg">🇺🇸 EUA</option>
                    <option value="assets/Mexico.jpg">🇲🇽 México</option>
                    <option value="assets/paraguai.jpg">🇵🇾 Paraguai</option>
                    <option value="assets/uruguai.jpg">🇺🇾 Uruguai</option>
                </select>
            </div>

            <button type="submit" class="btn-save">Salvar Seleção</button>
            <a href="index.php" class="btn-cancel">Cancelar</a>
        </form>
    </div>
</body>
</html>