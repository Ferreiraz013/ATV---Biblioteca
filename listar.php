<?php
require_once "conexao.php";
$sql = "SELECT id, titulo, autor, editora, ano_publicacao
        FROM livros
        ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$livros = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros Cadastrados</title>
    <link rel="stylesheet" href="./CSS Global/style.css">
</head>

<body>
    <div class="container">
        <h1>Livros Cadastrados</h1>
        <p>
            Total de livros:
            <strong><?= count($livros) ?></strong>
        </p>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Editora</th>
                    <th>Ano</th>
                </tr>
            </thead>

            <tbody>
                <?php if (count($livros) > 0): ?>
                    <?php foreach ($livros as $livro): ?>
                        <tr>
                            <td>
                                <?= (int)$livro["id"] ?>
                            </td>

                            <td>
                                <?= htmlspecialchars(
                                    $livro["titulo"],
                                    ENT_QUOTES,
                                    "UTF-8"
                                ) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars(
                                    $livro["autor"],
                                    ENT_QUOTES,
                                    "UTF-8"
                                ) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars(
                                    $livro["editora"],
                                    ENT_QUOTES,
                                    "UTF-8"
                                ) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars(
                                    (string)$livro["ano_publicacao"],
                                    ENT_QUOTES,
                                    "UTF-8"
                                ) ?>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                <?php else: ?>

                    <tr>
                        <td colspan="5">
                            Nenhum livro cadastrado.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <p class="link">
            <a href="index.php">Voltar ao cadastro</a>
        </p>
    </div>
    
</body>
</html>