<?php 
    require_once 'db.php';
    require_once 'authenticate.php';


    $query= $pdo->prepare("SELECT * FROM MEDICO");
    $query->execute();
    $medicos = $query->fetchAll(PDO::FETCH_ASSOC);

    $query= $pdo->prepare("SELECT * FROM PACIENTE");
    $query->execute();
    $pacientes = $query->fetchAll(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_medicos = $_POST['id_medicos'];
        $id_pacientes = $_POST['id_pacientes'];
        $data_consulta = $_POST['data_consulta'];
        $hora_consulta = $_POST['hora_consulta'];
        $observacao = $_POST['observacao'];

        // Insere o novo usuário no banco de dados
        $query = $pdo->prepare("INSERT INTO CONSULTA (ID_MEDICO, ID_PACIENTE, DATA_CONSULTA, HORA_CONSULTA, OBSERVACAO) VALUES (?, ?, ?, ?, ?)");
        $query->execute([$id_medicos, $id_pacientes, $data_consulta, $hora_consulta, $observacao]);
        header("Location: index-consulta.php");
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Cadastro de consulta</title>
</head>
<body>
    <header>
        <h1>
            Cadastro de consulta
        </h1>

        <a href="../index.php">Voltar</a><br><br>
        
    </header>

    <form action="" method="post">

        <label for="id_pacientes">Paciente: </label><br>
        <select name="id_pacientes" id="id_pacientes" required>
            <option value="">Selecione</option>
            <?php foreach ($pacientes as $paciente): ?>
                <option value="<?= $paciente['ID'] ?>"><?= $paciente['NOME'] ?></option>
            <?php endforeach; ?>
        </select><br>



        <label for="id_medicos">Médico: </label><br>
        <select name="id_medicos" id="id_medicos" required>
            <option value="">Selecione</option>
            <?php foreach ($medicos as $medico): ?>
                <option value="<?= $medico['ID'] ?>"><?= $medico['NOME'] ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="data_consulta">Data: </label><br>
        <input type="date" name="data_consulta" id="data_consulta" required><br>

        <label for="hora_consulta">Hora: </label><br>
        <input type="time" name="hora_consulta" id="hora_consulta" required><br>

        <label for="observacao">Observação: </label><br>
        <textarea type="text" name="observacao" id="observacao" class="observacao"></textarea><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>