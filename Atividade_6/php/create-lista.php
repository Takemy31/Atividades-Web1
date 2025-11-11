<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $genero = $_POST['genero'];
    $data_publicacao = $_POST['data_publicacao'];
    $nota = $_POST['nota'];
    $stmt = $pdo->prepare("INSERT INTO animes (nome, genero, data_publicacao, nota) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nome, $genero, $data_publicacao, $nota]);
    
    header('Location: index-lista.php');
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
                <li><a href="index-lista.php">Lista</a></li>
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