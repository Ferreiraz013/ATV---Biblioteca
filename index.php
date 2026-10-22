<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Livros</title>
    <link rel="stylesheet" href="./CSS Global/style.css">
</head>

<body>
    <div class="container">
        <h1>Cadastro de Livros</h1>
        <form action="salvar.php" method="POST">
            <label for="titulo">Título do livro:</label>
            <input
                type="text"
                id="titulo"
                name="titulo"
                maxlength="150"
                required>
            <br><br>

            <label for="autor">Autor:</label>
            <input
                type="text"
                id="autor"
                name="autor"
                maxlength="100"
                required>
            <br><br>

            <label for="editora">Editora:</label>
            <input
                type="text"
                id="editora"
                name="editora"
                maxlength="100"
                required>
            <br><br>

            <label for="ano_publicacao">Ano de publicação:</label>
            <input
                type="number"
                id="ano_publicacao"
                name="ano_publicacao"
                min="1901"
                max="2155"
                required>
            <br><br>

            <button type="submit">Cadastrar Livro</button>
        </form>

        <p class="link">
            <a href="listar.php">Ver livros cadastrados</a>
        </p>
    </div>

</body>
</html>