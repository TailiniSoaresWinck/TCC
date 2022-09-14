<?php
 if(empty($_SESSION['aluno_id'])){
    header('Location:../views/unset.php');
}
include_once('../templates/cabecalho.php');
?>
<html lang="pt-BR">
<body>
    <h2>Home de busca<h2>
    <form action="../views/resultadoVaga.php" method="POST" >
        <label for="">Titulo da vaga</label>
        <input type="text" name="titulo_vaga" placeholder="Insira o titulo da vaga">
        <button type="submit">Buscar</button>
    </form>
</body>
</html>