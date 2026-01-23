<?php
require_once 'db.php';
require_once 'authenticate.php';

$id = $_GET['id'];

$query = $pdo->prepare(
    "SELECT c.ID_CON, c.DATA_CONSULTA, c.HORA_CONSULTA, c.OBSERVACAO,
        p.ID AS PACIENTE_ID, p.NOME AS PACIENTE_NOME,
        m.ID AS MEDICO_ID, m.NOME AS MEDICO_NOME
    FROM CONSULTA c
    INNER JOIN PACIENTE p ON c.ID_PACIENTE = p.ID
    INNER JOIN MEDICO m ON c.ID_MEDICO = m.ID
    WHERE c.ID_CON = ?"
);
$query->execute([$id]);
$consulta = $query->fetch(PDO::FETCH_ASSOC);

$query = $pdo->prepare("SELECT * FROM MEDICO");
$query->execute();
$medicos = $query->fetchAll(PDO::FETCH_ASSOC);

$query = $pdo->prepare("SELECT * FROM PACIENTE");
$query->execute();
$pacientes = $query->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_pacientes = $_POST['id_pacientes'];
    $id_medicos = $_POST['id_medicos'];
    $data = $_POST['data_consulta'];
    $hora = $_POST['hora_consulta'];
    $observacao = $_POST['observacao'];

    $query = $pdo->prepare("UPDATE CONSULTA SET ID_PACIENTE = ?, ID_MEDICO = ?, DATA_CONSULTA = ?, HORA_CONSULTA = ?, OBSERVACAO = ? WHERE ID_CON = ?");
    $query->execute([$id_pacientes, $id_medicos, $data, $hora, $observacao, $id]);
    header("Location: read-consulta.php?id=$id");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Edição de consulta</title>
</head>
<body>
    <header>
        <h1>Edição de Consulta</h1>
        <a href="read-consulta.php?id=<?= $id ?>">Voltar</a><br><br>
    </header>

    <form action="" method="post">
        <label for="id_pacientes">Paciente: </label><br>
        <select name="id_pacientes" id="id_pacientes" required>
            <option value="">Selecione</option>
            <?php foreach ($pacientes as $paciente): ?>
                <option value="<?= $paciente['ID'] ?>" <?= $paciente['ID'] == $consulta['PACIENTE_ID'] ? 'selected' : '' ?>>
                    <?= $paciente['NOME'] ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label for="id_medicos">Médico: </label><br>
        <select name="id_medicos" id="id_medicos" required>
            <option value="">Selecione</option>
            <?php foreach ($medicos as $medico): ?>
                <option value="<?= $medico['ID'] ?>" <?= $medico['ID'] == $consulta['MEDICO_ID'] ? 'selected' : '' ?> >
                    <?= $medico['NOME'] ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label for="data_consulta">Data: </label><br>
        <input type="date" name="data_consulta" id="data_consulta" value="<?= $consulta['DATA_CONSULTA'] ?>" required><br>

        <label for="hora_consulta">Hora: </label><br>
        <input type="time" name="hora_consulta" id="hora_consulta" value="<?= $consulta['HORA_CONSULTA'] ?>" required><br>

        <label for="observacao">Observacao: </label><br>
        <textarea name="observacao" id="observacao" class="observacao"><?= $consulta['OBSERVACAO'] ?></textarea><br>

        <input type="submit" value="Editar">
    </form>
</body>
</html>
