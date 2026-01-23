<?php
require_once 'db.php';
require_once 'authenticate.php';

$id = $_GET['id'];

$query = $pdo->prepare("DELETE FROM PACIENTE WHERE ID = ?");
$query->execute([$id]);

header('Location: index-paciente.php');
exit;
?>