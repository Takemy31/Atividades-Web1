<?php session_start(); ?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Administrativo</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Sistema Administrativo de Consultório Médico</h1>
        <ul>
            <?php if (isset($_SESSION['user_id'])): ?>
            <a href="php/create-medico.php">Adicionar Médico</a><br>
            <a href="php/index-medico.php">Lista de Médicos</a><br><br>

            <a href="php/create-paciente.php">Adicionar Paciente</a><br>
            <a href="php/index-paciente.php">Lista de Pacientes</a><br><br>

            <a href="php/create-consulta.php">Adicionar Consulta</a><br>
            <a href="php/index-consulta.php">Lista de Consultas</a><br><br>

            <a href="php/logout.php">Logout (<?= $_SESSION['username'] ?>)</a>
             <?php else: ?>
                    <li><a href="php/user-login.php">Login</a></li>
                    <li><a href="php/user-register.php">Registrar</a></li>
                <?php endif; ?>
        </ul>
    </header>
     <main>
        <p>Utilize o menu acima para navegar pelo sistema.</p>
    </main>
</body>
</html>