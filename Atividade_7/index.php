<?php session_start(); ?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Animes</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Bem vindo ao nosso site de Animes</h1>
        <ul>
            <?php if (isset($_SESSION['user_id'])): ?>
            <li><a href="php/create-lista.php">Adicionar Anime</a></li>
            <li><a href="php/index-lista.php">Listar Animes</a></li>
            <li><a href="php/logout.php">Logout (<?= $_SESSION['username'] ?>)</a></li>
             <?php else: ?>
                    <li><a href="php/user-login.php">Login</a></li>
                    <li><a href="php/user-register.php">Registrar</a></li>
                <?php endif; ?>
        </ul>
    </header>
     <main>
        <p>Utilize o menu acima para navegar pelo sistema.</p>
    </main>
</body>
</html>