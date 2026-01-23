<?php
require_once 'db.php';
require_once 'authenticate.php';

$id = $_GET['id'];

$query = $pdo->prepare("DELETE FROM CONSULTA WHERE ID_CON = ?");
$query->execute([$id]);

header('Location: index-consulta.php');
exit;
?>