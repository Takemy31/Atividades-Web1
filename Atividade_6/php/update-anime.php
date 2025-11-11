<?php
require_once 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM animes WHERE id = ?");
$stmt->execute([$id]);
$anime = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $genero = $_POST['genero'];
    $data_publicacao = $_POST['data_publicacao'];
    $nota = $_POST['nota'];

    $stmt = $pdo->prepare("UPDATE animes SET nome = ?, genero = ?, data_publicacao = ?, nota = ? WHERE id = ?");

    $stmt->execute([$nome, $genero, $data_publicacao, $nota, $id]);

    header('Location: index-lista.php');
}
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Anime</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="index-lista.php">Listar Animes</a></li>
                <li><a href="create-lista.php">Adicionar Anime</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Editar Anime</h2>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?= $anime['nome'] ?>" required><br><br>

            <label for="genero">Gênero:</label>
            <input type="text" id="genero" name="genero" value="<?= $anime['genero'] ?>" required><br><br>

            <label for="data_publicacao">Data de Publicação:</label>
            <input type="date" id="data_publicacao" name="data_publicacao" value="<?= $anime['data_publicacao'] ?>" required><br><br>

            <label for="nota">Nota:</label>
            <input type="number" id="nota" name="nota" value="<?= $anime['nota'] ?>" required><br><br>

            <button type="submit">Atualizar</button>
        </form>
    </main>
</body>
</html>