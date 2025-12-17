<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $tipo_sanguineo = $_POST['tipo_sanguineo'];

    $query = $pdo->prepare("INSERT INTO PACIENTE (NOME, DATA_NASCIMENTO, TIPO_SANGUINEO) VALUES (?, ?, ?)");
    $query->execute([$nome, $data_nascimento, $tipo_sanguineo]);

    header('Location: index-paciente.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Pacientes</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <h1>Adicionar Novos Pacientes</h1>

        <li><a href="../index.php" target="_self">Voltar</a></li><br>
    </header>

    <main>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required><br><br>

            <label for="data_Nascimento">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" required><br><br>

            <label for="tipo_senguineo">Tipo Sanguíneo:</label>
            <select id="tipo_sanguineo" name="tipo_sanguineo" required>
                <option value="">Selecione o tipo sanguíneo</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                    </select><br><br>

            <button type="submit">Adicionar</button>
              
        </form>
    </main>
</body>
</html>