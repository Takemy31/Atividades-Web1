<?php
require_once 'db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM livros WHERE id = ?");
$stmt->execute([$id]);


echo "<strong>Livro Excluido Com Sucesso!!";
echo "<button><a href='lista_livros.php'>Voltar</a></button>";
?>
