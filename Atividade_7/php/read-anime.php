<?php
    require_once 'db.php';
    require_once 'authenticate.php';

    $id = $_GET['id'];
    $user_id = $_SESSION['user_id'];
    $stmt = $pdo->prepare("SELECT * FROM animes WHERE id = ? AND user_id = ?");
    $stmt->execute([$id, $user_id]);
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
                 <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="index-lista.php">Listar animes</a></li>
                <li><a href="create-lista.php">Adicionar anime</a></li>
                <?php else: ?>
                    <li><a href="user-login.php">Login</a></li>
                    <li><a href="user-register.php">Registrar</a></li>
                <?php endif; ?>
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