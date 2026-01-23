<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);

    $query = $pdo->prepare("INSERT INTO ADMINISTRADOR (USUARIO, SENHA) VALUES (?, ?)");
    $query->execute([$usuario, $senha]);
    header('Location: user-login.php');
    exit;
} 

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuário</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <h1>Registrar Usuário</h1>

        <a href="../index.php">Voltar</a><br><br>
    </header>
  
    <main>
        
        <form method="POST">
            <label for="usuario">Nome de Usuário:</label>
            <input type="text" id="usuario" name="usuario" required>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
            <button type="submit">Registrar</button>
        </form>
    </main>
</body>
</html>