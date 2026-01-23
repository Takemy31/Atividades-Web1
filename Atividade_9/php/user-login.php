<?php
    require_once 'db.php';
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuario_input = $_POST['usuario'];
        $senha = $_POST['senha'];

        $query = $pdo->prepare("SELECT * FROM ADMINISTRADOR WHERE USUARIO = ?");
        $query->execute([$usuario_input]);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($senha, $user['SENHA'])) {
            $_SESSION['user_id'] = $user['ID'];
            $_SESSION['username'] = $user['USUARIO'];
            header('Location: ../index.php');
            exit;
        } else {
            echo "<p>Nome de usuário ou senha incorretos!</p>";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Login</title>
</head>
<body>
    <header>
        <h1>Sistema de Cadastro de Consultas</h1>
    </header>

    <a href="../index.php">Voltar</a><br><br>



    <form action="" method="post">
            <label for="usuario">usuario: </label><br>
            <input type="text" name="usuario" id="usuario" required><br>

            <label for="senha">Senha: </label><br>
            <input type="password" name="senha" id="senha" required><br>

            <input type="submit" value="Login">
    </form>
</body>
</html>