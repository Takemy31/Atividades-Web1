<?php
require_once 'db.php';

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome_livro = $_POST['nome_livro'];
        $autor = $_POST['autor'];
        $data_publicacao = $_POST['data_publicacao'];

        $stmt = $pdo->prepare("INSERT INTO livros (nome_livro, autor, data_publicacao) VALUES (?,?,?)");
        $stmt->execute([$nome_livro, $autor ,$data_publicacao]);
     
        echo "O Livro $nome_livro, publicado em $data_publicacao pelo Autor $autor, foi cadastrado com sucesso";
        echo "<button><a href='cadastrar_livro.php'>Voltar</a></button>";
        echo "<button><a href='lista_livros.php'>Sua Lista</a></button>";
    }else{
        echo "Não usou método POST";
    }

?>