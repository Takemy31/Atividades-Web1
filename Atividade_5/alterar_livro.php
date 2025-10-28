<?php
  require_once 'db.php';

  $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        
        $stmt = $pdo->prepare("SELECT * FROM livros WHERE id = ?");
        $stmt->execute([$id]);
        $livros = $stmt->fetch(PDO::FETCH_ASSOC);


    }else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome_livro = $_POST['nome_livro'];
        $autor = $_POST['autor'];
        $data_publicacao = $_POST['data_publicacao'];

        $stmt = $pdo->prepare("UPDATE livros SET nome_livro = ?, autor = ?, data_publicacao = ? WHERE id = ?");
    
        $stmt->execute([$nome_livro, $autor, $data_publicacao, $id]);

        echo "Dados alterados com sucesso.";
        echo "<button><a href='lista_livros.php'>Voltar</a></button>";

    }

?>

<html>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    ?>
    <form method="POST">
        Nome do Livro: <input type="text" name="nome_livro" value="<?php echo $livros['nome_livro'];?>">
        <br>Autor: <input type="text" name="autor" value="<?php echo $livros['autor'];?>">
        <br>Data de Publicacão: <input type="date" name="data_publicacao" value="<?php echo $livros['data_publicacao'];?>">
        <br><input type="submit" > 
    </form>
    <?php
    } ?>

</html>