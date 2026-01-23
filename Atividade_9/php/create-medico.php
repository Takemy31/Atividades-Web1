<?php
require_once 'db.php';
require_once 'authenticate.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $especialidade = $_POST['especialidade'];

    $query = $pdo->prepare("INSERT INTO MEDICO (NOME, ESPECIALIDADE) VALUES (?, ?)");
    $query->execute([$nome, $especialidade]);

    header('Location: index-medico.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Medico</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <h1>Cadastrar Medico</h1>
        <nav><a href="../index.php">Voltar</a></nav>
    </header>

    <main>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required><br><br>

            <label for="especialidade">Especialidade:</label>
            <input type="text" id="especialidade" name="especialidade" required><br><br>

            <button type="submit">Adicionar</button>
        </form>
    </main>
</body>
</html>