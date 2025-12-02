<?php
require_once 'db.php';
require_once 'authenticate.php';

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("DELETE FROM animes WHERE id = ? AND user_id = ?");
$stmt->execute([$id, $user_id]);
if ($stmt->rowCount() == 0) {
	$_SESSION['error'] = "Você não tem permissão para deletar este anime!";
}

header('Location: index-lista.php');
exit;
?>