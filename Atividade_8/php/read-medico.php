<?php
require_once 'db.php';
require_once 'authenticate.php';

$id = $_GET['id'];

$query= $pdo->prepare("SELECT * FROM MEDICO WHERE ID = ?");
    $query->execute([$id]);
    $medicos = $query->fetch(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/styles.css">
<title>Detalhes do Médico</title>
</head>
<body>
 
    <header>
        <h1>Detalhes do Médico</h1>
        <nav><a href="index-medico.php">Voltar</a></nav>
    </header>

     <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Especialidade</th>
                <th colspan="1">Ações</th>
            </tr>
        </thead>

        <tbody>
                <tr>
                <td><?= $medicos['ID'] ?></td>
                <td><?= $medicos['NOME'] ?></td>
                <td><?= $medicos['ESPECIALIDADE'] ?></td>

                <td><a href="update-medico.php?id=<?= $medicos['ID']?>">Editar</a></td>
                <td><a href="delete-medico.php?id=<?= $medicos['ID']?>">Excluir</a></td>
            </tr>
        </tbody>
    </table>
</body>
</html>