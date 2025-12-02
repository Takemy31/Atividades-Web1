<?php
require_once 'db.php';
require_once 'authenticate.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $genero = $_POST['genero'];
    $data_publicacao = $_POST['data_publicacao'];
    $nota = $_POST['nota'];
    // Associa o anime ao usuário logado
    $user_id = $_SESSION['user_id'];
    $stmt = $pdo->prepare("INSERT INTO animes (nome, genero, data_publicacao, nota, user_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nome, $genero, $data_publicacao, $nota, $user_id]);
    
    header('Location: index-lista.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Anime</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Listagem de Animes</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="index-lista.php">Lista</a></li>
                <li><a href="logout.php">Logout (<?= $_SESSION['username'] ?>)</a></li>
                <?php else: ?>
                    <li><a href="user-login.php">Login</a></li>
                    <li><a href="user-register.php">Registrar</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Adicionar anime</h2>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required><br><br>
          
            <label for="genero">Gênero:</label>
            <input type="text" id="genero" name="genero" required><br><br>

            <label for="data_publicacao">Data de Publicação:</label>
            <input type="date" id="data_publicacao" name="data_publicacao" required><br><br>

            <label for="nota">Nota:</label>
            <input type="number" id="nota" name="nota" step="0.1" min="0" max="10" required><br><br>
            
            <button type="submit">Adicionar</button>
        </form>
    </main>
</body>
</html>