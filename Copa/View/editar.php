<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar infromações</title>
</head>
<body>
<h1>Editar Informações</h1>

<form action="index.php?action=atualizar" method="post">
<input type="hidden" name="id" value="<?= $aluno['id']?>">
        <label>Informe o grupo </label>
        <input type="text" placeholder="Digite o grupo..." require autocrement="of">
        
        <label>Nome do time: </label>
        <input type="text" placeholder="Digite o nome do time..." value="<?= safe($aluno['nome'])?>" require autocrement="of">
        <label>Informe quantos titulos cada time tem:</label>
        <input type="text" placeholder="Digite os titulos..." value="<?= safe($aluno['titlulos'])?>" require autocrement="of">
        <label>Bandeira do time:</label>
        <input type="file" name="bandeira" accept="image/*"><br>
        <button type="submit">Enviar</button>
        <a href="index.php">Voltar para a lista</a>
</form>
    
</body>
</html>