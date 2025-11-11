<?php
require_once 'db.php';

$stmt = $pdo->query("SELECT * FROM animes");

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
            <li><a href="create-lista.php">Adicionar Anime</a></li>
        </ul>
    </nav>
</header>

<main>
    <h2>Lista de Animes</h2>
    <table>
        <thead>
            <tr>
        <table border="1">  
                <th><strong>ID</strong></th>
                <th><strong>Nome</strong></th>
                <th><strong>Gênero</strong></th>
                <th><strong>Data de Publicação</strong></th>
                <th><strong>Nota</strong></th>
                <th><strong>Ações</strong></th>
            </tr>
        </thead>
    <tbody>
        <?php foreach ($animes as $animes): ?>
            <tr>
                <td><?= $animes['id'] ?></td>
                <td><?= $animes['nome'] ?></td>
                <td><?= $animes['genero'] ?></td>
                <td><?= $animes['data_publicacao'] ?></td>
                <td><?= $animes['nota'] ?></td>
                <td>
                    <a href="read-anime.php?id=<?= $animes['id'] ?>">Visualizar</a>
                    <a href="update-anime.php?id=<?= $animes['id'] ?>">Editar</a>
                    <a href="delete-anime.php?id=<?= $animes['id'] ?>">Excluir</a>
                </td>
            </tr>   
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

</html>