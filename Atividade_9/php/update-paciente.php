<?php 
    require_once 'db.php';
    require_once 'authenticate.php';

    $id = $_GET['id'];

    $query= $pdo->prepare("SELECT paciente.*, imagens.path FROM PACIENTE LEFT JOIN imagens ON paciente.imagem_id = imagens.id WHERE paciente.ID = ?");
    $query->execute([$id]);
    $paciente = $query->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $data_nascimento = $_POST['data_nascimento'];
        $tipo_sanguineo = $_POST['tipo_sanguineo'];

        $imagem_id = $paciente['imagem_id'];

        if (!empty($_FILES['imagem']['name'])) {
            $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
            $novoNome = uniqid() . '.' . $extensao;
            $caminho = __DIR__ . '/../storage/' . $novoNome;

            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho)) {
                $stmt = $pdo->prepare("INSERT INTO imagens (path) VALUES (?)");
                $stmt->execute([$novoNome]);
                $imagem_id = $pdo->lastInsertId();
            }
        }

        $query = $pdo->prepare("UPDATE PACIENTE SET NOME = ?, DATA_NASCIMENTO = ?, TIPO_SANGUINEO = ?, imagem_id = ? WHERE ID = ?");
        $query->execute([$nome, $data_nascimento, $tipo_sanguineo, $imagem_id, $id]);
        header("Location: index-paciente.php");
        exit;
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Edição de cadastro</title>
</head>
<body>
    <header>
        <h1>
            Edição de paciente
        </h1>
         <a href="index-paciente.php">Voltar</a><br><br>
    </header>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="nome">Nome: </label><br>
        <input type="text" name="nome" id="nome" value="<?= $paciente['NOME'] ?>" required><br>

        <label for="data_nascimento">Data de nascimento: </label><br>
        <input type="date" name="data_nascimento" id="data_nascimento" value="<?= $paciente['DATA_NASCIMENTO'] ?>" required><br>

        <label for="tipo_sanguineo">Tipo sanguíneo: </label><br>
        <select name="tipo_sanguineo" id="tipo_sanguineo" required>
            <option value="">Selecione</option>
            <option value="A+" <?= $paciente['TIPO_SANGUINEO'] == 'A+' ? 'selected' : '' ?>>A+</option>
            <option value="A-" <?= $paciente['TIPO_SANGUINEO'] == 'A-' ? 'selected' : '' ?>>A-</option>
            <option value="B+" <?= $paciente['TIPO_SANGUINEO'] == 'B+' ? 'selected' : '' ?>>B+</option>
            <option value="B-" <?= $paciente['TIPO_SANGUINEO'] == 'B-' ? 'selected' : '' ?>>B-</option>
            <option value="AB+" <?= $paciente['TIPO_SANGUINEO'] == 'AB+' ? 'selected' : '' ?>>AB+</option>
            <option value="AB-" <?= $paciente['TIPO_SANGUINEO'] == 'AB-' ? 'selected' : '' ?>>AB-</option>
            <option value="O+" <?= $paciente['TIPO_SANGUINEO'] == 'O+' ? 'selected' : '' ?>>O+</option>
            <option value="O-" <?= $paciente['TIPO_SANGUINEO'] == 'O-' ? 'selected' : '' ?>>O-</option>
        </select><br>

        <label for="imagem">Imagem de Perfil (atual: <?php if ($paciente['path']) { echo '<img src="../storage/' . $paciente['path'] . '" width="50">'; } else { echo 'Nenhuma'; } ?>):</label><br>
        <input type="file" name="imagem" id="imagem" accept="image/*"><br>

        <input type="submit" value="Editar">
    </form>
</body>
</html>