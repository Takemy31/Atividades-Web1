<?php 
    require_once 'db.php';
    require_once 'authenticate.php';

$query= $pdo->prepare("SELECT * FROM PACIENTE");
$query->execute();
$pacientes = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Lista de pacientes</title>
</head>
<body>
    <header>
        <h1>
            Lista de pacientes
        </h1>

        <a href="../index.php">Voltar</a><br><br>
    </header>

    <?php if (!empty($pacientes)): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data de nascimento</th>
                    <th>Tipo sanguíneo</th>
                    <th>Ações</th>
                </tr>
            </thead>
    
            <tbody>
                <?php foreach ($pacientes as $paciente): ?>
                    <tr>
                        <td><?= $paciente['ID'] ?></td>
                        <td><?= $paciente['NOME'] ?></td>
                        <td><?= $paciente['DATA_NASCIMENTO'] ?></td>
                        <td><?= $paciente['TIPO_SANGUINEO'] ?></td>

                        <td><a href="read-paciente.php?id=<?= $paciente['ID']?>">Visualizar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php else: ?>
        <p>Nenhum paciente cadastrado</p>
    <?php endif?>

</body>
</html>
