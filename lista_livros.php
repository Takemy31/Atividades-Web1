<?php 
require_once 'db.php';

  if ($_SERVER['REQUEST_METHOD'] == 'GET') {
   
    $query= $pdo->query("
     SELECT id, nome_livro, autor, data_publicacao
     FROM livros
     ");

    $livros = $query->fetchAll(PDO::FETCH_ASSOC);



  foreach ($livros as $livros){
    echo"<strong>ID: </strong>". $livros['id'] .
        "<strong><br>Nome do Livro: </strong>" . $livros['nome_livro'] . 
        "<strong><br>Autor: </strong>" . $livros['autor'] . 
        "<strong><br>Data de Publicação: </strong>" . $livros['data_publicacao'] .

        "<br><button><a href='alterar_livro.php?id=".$livros['id']."'>Alterar</a></button>" . 
        "<button><a href='excluir_livro.php?id=". $livros['id'] ."'>Excluir</a></button><br><br>";
        }
    }
    echo "<button><a href='cadastrar_livro.php'>Voltar</a></button>";
?>