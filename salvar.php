<?php
require_once "conexao.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = trim($_POST["titulo"] ?? "");
    $autor = trim($_POST["autor"] ?? "");
    $editora = trim($_POST["editora"] ?? "");
    $ano_publicacao = trim($_POST["ano_publicacao"] ?? "");

    if (
        $titulo == "" ||
        $autor == "" ||
        $editora == "" ||
        $ano_publicacao == ""
    ) {
        die("Preencha todos os campos do cadastro.");
    }

    if (
        !ctype_digit($ano_publicacao) ||
        (int)$ano_publicacao < 1901 ||
        (int)$ano_publicacao > 2155
    ) {
        die('Ano de publicação inválido. <a href="index.php">Voltar</a>');
    }

    if (
        mb_strlen($titulo, "UTF-8") > 150 ||
        mb_strlen($autor, "UTF-8") > 100 ||
        mb_strlen($editora, "UTF-8") > 100
    ) {
        die('Um dos campos ultrapassou o limite permitido. <a href="index.php">Voltar</a>');
    }

    try {
        $sql = "INSERT INTO livros
                (titulo, autor, editora, ano_publicacao)
                VALUES
                (:titulo, :autor, :editora, :ano_publicacao)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":titulo" => $titulo,
            ":autor" => $autor,
            ":editora" => $editora,
            ":ano_publicacao" => (int)$ano_publicacao
        ]);

        echo '<div class="container">';
        echo '<h1>Cadastro realizado com sucesso!</h1>';
        echo '<p>O livro foi salvo no banco de dados.</p>';
        echo '<p><a href="index.php">Cadastrar outro livro</a></p>';
        echo '<p><a href="listar.php">Ver livros cadastrados</a></p>';
        echo '</div>';
    } catch (PDOException $e) {
        echo '<div class="container">';
        echo '<h1>Erro ao cadastrar</h1>';
        echo '<p>Não foi possível salvar o livro. Tente novamente.</p>';
        echo '<p><a href="index.php">Voltar ao cadastro</a></p>';
        echo '</div>';
    }
} else {
    header("Location: index.php");
    exit;
}
?>