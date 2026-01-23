<?php 
    require_once 'db.php';
    require_once 'authenticate.php';

    $id = $_GET['id'];

    $query= $pdo->prepare("SELECT * FROM MEDICO WHERE ID = ?");
    $query->execute([$id]);
    $medicos = $query->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $especialidade = $_POST['especialidade'];

        // Insere o novo usuário no banco de dados
        $query = $pdo->prepare("UPDATE MEDICO SET NOME = ?, ESPECIALIDADE = ? WHERE ID = ?");
        $query->execute([$nome, $especialidade, $id]);
        header("Location: ./index-medico.php?id=$id");
    }

?>

<!DOCTYPE html>
<html lang="pt-br">  
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Atualização de cadastro</title>
</head>
<body>
    <header>
        <h1>
            Atualização de cadastro de médico
        </h1>

        <a href="index-medico.php">Voltar</a><br><br>
    </header>

     <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?= $medicos['NOME'] ?>" required><br><br>

            <label for="especialidade">Especialidade:</label>
            <input type="text" id="especialidade" name="especialidade" value="<?= $medicos['ESPECIALIDADE'] ?>" required><br><br>

            <button type="submit">Editar</button>
    </form>
</body>
</html>