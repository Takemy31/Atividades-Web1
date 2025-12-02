<?php
require_once 'db.php';
require_once 'authenticate.php';

// Mostrar apenas os animes do usuário logado
$stmt = $pdo->prepare("SELECT * FROM animes WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$animes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Animes</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<header>
    <h1>Bem-vindo ao Sistema de Listagem de Animes</h1>
    <nav>
        <ul>
            <li><a href="../index.php">Home</a></li>
            <?php if (isset($_SESSION['user_id'])): ?>
            <li><a href="create-lista.php">Adicionar Anime</a></li>
             <li><a href="logout.php">Logout (<?= $_SESSION['username'] ?>)</a></li>
                <?php else: ?>
                    <li><a href="user-login.php">Login</a></li>
                    <li><a href="user-register.php">Registrar</a></li>
                <?php endif; ?>
        </ul>
    </nav>
</header>

<main>
    <h2>Lista de Animes</h2>
    <table border="1">
        <thead>
            <tr>
                <th><strong>ID</strong></th>
                <th><strong>Nome</strong></th>
                <th><strong>Gênero</strong></th>
                <th><strong>Data de Publicação</strong></th>
                <th><strong>Nota</strong></th>
                <th><strong>Ações</strong></th>
            </tr>
        </thead>
    <tbody>
        <?php foreach ($animes as $anime): ?>
            <tr>
                <td><?= $anime['id'] ?></td>
                <td><?= $anime['nome'] ?></td>
                <td><?= $anime['genero'] ?></td>
                <td><?= $anime['data_publicacao'] ?></td>
                <td><?= $anime['nota'] ?></td>
                <td>
                    <a href="read-anime.php?id=<?= $anime['id'] ?>">Visualizar</a>
                    <a href="update-anime.php?id=<?= $anime['id'] ?>">Editar</a>
                    <a href="delete-anime.php?id=<?= $anime['id'] ?>">Excluir</a>
                </td>
            </tr>   
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

</html>