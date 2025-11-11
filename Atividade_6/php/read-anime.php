<?php
    require_once 'db.php';
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM animes WHERE id = ?");
    $stmt->execute([$id]);
    $anime = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do anime</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="index-lista.php">Listar animes</a></li>
                <li><a href="create-lista.php">Adicionar anime</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Detalhes do anime</h2>
        <?php if ($anime): ?>
            <p><strong>ID:</strong> <?= $anime['id'] ?></p>
            <p><strong>Nome:</strong> <?= $anime['nome'] ?></p>
            <p><strong>Gênero:</strong> <?= $anime['genero'] ?></p>
            <p><strong>Data de Publicação:</strong> <?= $anime['data_publicacao'] ?></p>
            <p><strong>Nota:</strong> <?= $anime['nota'] ?></p>
            <p>
                <a href="update-anime.php?id=<?= $anime['id'] ?>">Editar</a>
                <a href="delete-anime.php?id=<?= $anime['id'] ?>">Excluir</a>
            </p>
        <?php else: ?>
            <p>Anime não encontrado.</p>
        <?php endif; ?>
    </main>
</body>
</html>