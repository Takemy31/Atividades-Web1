<?php
require_once 'db.php';
require_once 'authenticate.php';

$id = $_GET['id'];

$query = $pdo->prepare("SELECT paciente.*, imagens.path FROM paciente LEFT JOIN imagens 
ON paciente.imagem_id = imagens.id WHERE paciente.id = ?");

    $query->execute([$id]);
    $paciente = $query->fetch(PDO::FETCH_ASSOC);

    if ($paciente['path']) {
        $imagemPath = '../storage/' . $paciente['path'];
    } else {
        $imagemPath = '../storage/profile.jpg';
    }

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
                <th>Imagem</th>
                <th>ID</th>
                <th>Nome</th>
                <th>Data de nascimento</th>
                <th>Tipo sanguíneo</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td><img src="<?= $imagemPath ?>" alt="Imagem de Perfil" style="width: 150px; height: 150px;"></td>
                <td><?= $paciente['ID'] ?></td>
                <td><?= $paciente['NOME'] ?></td>
                <td><?= $paciente['DATA_NASCIMENTO'] ?></td>
                <td><?= $paciente['TIPO_SANGUINEO'] ?></td>

                <td><a href="update-paciente.php?id=<?= $paciente['ID']?>">Editar</a></td>
                <td><a href="delete-paciente.php?id=<?= $paciente['ID']?>">Excluir</a></td>
            </tr>
        </tbody>
    </table>
</body>
</html>