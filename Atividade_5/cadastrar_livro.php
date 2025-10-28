<html>
    <h1>Atividade CRUD - Lucas Bezerra da Silva</h1>
    <h2>Coloque aqui os livros que você não quer esquecer</h2>
    <form method="POST" action="cadastrar_livro_action.php">
        Nome do Livro: <input type="text" name="nome_livro">
        <br><br>Autor: <input type="text" name="autor">
        <br><br>Data de Publicacão: <input type="date" name="data_publicacao">
        <br><input type="submit" > 
    </form>
    <button><a href="lista_livros.php">Lista de Livros</a></button>
</html>