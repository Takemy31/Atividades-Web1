<?php 
    require_once 'db.php';
    require_once 'authenticate.php';

    $id = $_GET['id'];

    $query= $pdo->prepare(
        "SELECT c.ID_CON, c.DATA_CONSULTA, c.HORA_CONSULTA, c.OBSERVACAO,
            p.ID AS PACIENTE_ID, p.NOME AS PACIENTE_NOME, p.DATA_NASCIMENTO AS PACIENTE_DATA_NASCIMENTO, p.TIPO_SANGUINEO AS PACIENTE_TIPO_SANGUINEO,
            m.ID AS MEDICO_ID, m.NOME AS MEDICO_NOME, m.ESPECIALIDADE AS MEDICO_ESPECIALIDADE
        FROM CONSULTA c
        INNER JOIN PACIENTE p ON c.ID_PACIENTE = p.ID
        INNER JOIN MEDICO m ON c.ID_MEDICO = m.ID
        WHERE c.ID_CON = ?"
    );
    $query->execute([$id]);
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
        <h1>
            Visualização de consulta
        </h1>
        <a href="index-consulta.php?">Voltar</a><br><br>

    </header>


    <table border="1">
        <thead>
            <tr> 
                <th colspan="4">Consulta</th>
                <th colspan="4">Paciente</th>
                <th colspan="3">Médico</th>
                <th rowspan="2" colspan="2">Ações</th>
            </tr>

            <tr>
                <th>ID</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Observação</th>

                <th>ID</th>
                <th>Nome</th>
                <th>Data de nascimento</th>
                <th>Tipo sanguíneo</th>

                <th>ID</th>
                <th>Nome</th>
                <th>Especialidade</th>

            </tr>
        </thead>

        <tbody>
            <?php foreach ($consultas as $consulta): ?>
                <tr>
                    <td><?= $consulta['ID_CON'] ?></td>
                    <td><?= $consulta['DATA_CONSULTA'] ?></td>
                    <td><?= $consulta['HORA_CONSULTA'] ?></td>
                    <td><?= $consulta['OBSERVACAO'] ?></td>
                    <td><?= $consulta['PACIENTE_ID'] ?></td>
                    <td><?= $consulta['PACIENTE_NOME'] ?></td>
                    <td><?= $consulta['PACIENTE_DATA_NASCIMENTO'] ?></td>
                    <td><?= $consulta['PACIENTE_TIPO_SANGUINEO'] ?></td>
                    <td><?= $consulta['MEDICO_ID'] ?></td>
                    <td><?= $consulta['MEDICO_NOME'] ?></td>
                    <td><?= $consulta['MEDICO_ESPECIALIDADE'] ?></td>

                    <td><a href="update-consulta.php?id=<?= $consulta['ID_CON']?>">Editar</a></td>
                    <td><a href="delete-consulta.php?id=<?= $consulta['ID_CON']?>">Excluir</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>