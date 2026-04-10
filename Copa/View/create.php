<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar informações</title>
</head>
<body>
    <h1>Adicionar Informações</h1>

    <form action="novo" method="post" enctype="multipart/form-data">
        <label>Informe o grupo </label>
        <input type="text" name="grupo" placeholder="Digite o grupo..." required><br>

        <label>Nome do time: </label>
        <input type="text" name="time" placeholder="Digite o nome do time..." required><br>

        <label>Informe quantos titulos cada time tem:</label>
        <input type="number" name="titulos" placeholder="Digite os titulos..." required><br>

        <label>Bandeira:</label>
        <select name="bandeira">
            <option value="uploads/bandeiras/brasil.png">Brasil</option>
            <option value="uploads/bandeiras/argentina.png">Argentina</option>
        </select>

        <button type="submit">Enviar</button>
        <a href="index.php">Voltar para a lista</a>
    </form>
</body>
</html>