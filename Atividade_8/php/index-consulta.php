<?php
require_once 'db.php';
require_once 'authenticate.php';

$query = $pdo->prepare(
    "SELECT c.ID_CON, c.DATA_CONSULTA, c.HORA_CONSULTA,
            p.ID AS PACIENTE_ID, p.NOME AS PACIENTE_NOME,
            m.ID AS MEDICO_ID, m.NOME AS MEDICO_NOME, m.ESPECIALIDADE AS MEDICO_ESPECIALIDADE
    FROM CONSULTA c
    INNER JOIN PACIENTE p ON c.ID_PACIENTE = p.ID
    INNER JOIN MEDICO m ON c.ID_MEDICO = m.ID
    ORDER BY c.ID_CON"
);
$query->execute();
$consultas = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Lista de consultas</title>
</head>
<body>
    <header>
        <h1>Lista de consultas</h1>
        <a href="../index.php">Voltar</a><br><br>
    </header>

    <?php if (!empty($consultas)): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>ID do paciente</th>
                    <th>Nome do paciente</th>
                    <th>Nome do médico</th>
                    <th>Especialidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($consultas as $consulta): ?>
                    <tr>
                        <td><?= $consulta['ID_CON'] ?></td>
                        <td><?= $consulta['DATA_CONSULTA'] ?></td>
                        <td><?= $consulta['HORA_CONSULTA'] ?></td>
                        <td><?= $consulta['PACIENTE_ID'] ?></td>
                        <td><?= $consulta['PACIENTE_NOME'] ?></td>
                        <td><?= $consulta['MEDICO_NOME'] ?></td>
                        <td><?= $consulta['MEDICO_ESPECIALIDADE'] ?></td>
                        <td><a href="read-consulta.php?id=<?= $consulta['ID_CON']?>">Visualizar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhuma consulta cadastrada</p>
    <?php endif?>
</body>
</html>