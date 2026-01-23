<?php
    require_once 'db.php';
    require_once 'authenticate.php';

    $query= $pdo->prepare("SELECT * FROM MEDICO");
    $query->execute();
    $medicos = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Medicos</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <h1>Lista de Medicos</h1><br>
        <nav><a href="../index.php">Voltar</a></nav><br>
        <a href="create-medico.php">Adicionar Novo Médico</a>
    </header>



   <?php if (!empty($medicos)): ?>  
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Especialidade</th>
                <th>Ações</th>
            </tr>
        </thead>


        <tbody>
            <?php foreach ($medicos as $medico): ?>
            <tr>
                <td><?= $medico['ID'] ?></td>
                <td><?= $medico['NOME'] ?></td>
                <td><?= $medico['ESPECIALIDADE'] ?></td>
                <td><a href="read-medico.php?id=<?= $medico['ID'] ?>">Visualizar</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php else: ?>
        <p>Nenhum médico cadastrado.</p>
    <?php endif; ?>
</body>
</html>    