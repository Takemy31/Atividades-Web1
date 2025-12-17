<?php
require_once 'db.php';
require_once 'authenticate.php';

$id = $_GET['id'];

$query= $pdo->prepare("SELECT * FROM PACIENTE WHERE ID = ?");
    $query->execute([$id]);
    $pacientes = $query->fetch(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/styles.css">
<title>Detalhes do Paciente</title>
</head>
<body>
 
    <header>
        <h1>Detalhes do Paciente</h1>
        <nav><a href="index-paciente.php">Voltar</a></nav>
    </header>

     <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data de nascimento</th>
                <th>Tipo sanguíneo</th>
                <th colspan="1">Ações</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                 <td><?= $pacientes['ID'] ?></td>
                <td><?= $pacientes['NOME'] ?></td>
                <td><?= $pacientes['DATA_NASCIMENTO'] ?></td>
                <td><?= $pacientes['TIPO_SANGUINEO'] ?></td>

                <td><a href="update-paciente.php?id=<?= $pacientes['ID']?>">Editar</a></td>
                <td><a href="delete-paciente.php?id=<?= $pacientes['ID']?>">Excluir</a></td>
            </tr>
        </tbody>
    </table>
</body>
</html>