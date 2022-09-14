<?php
    if(empty($_SESSION['empresa_id'])){
        header('Location:../views/unset.php');
    }

include_once('../templates/cabecalho.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<body>
    <h2>Busca Curriculo</h2>
    <form action="../views/resultadoCurriculo.php" method="POST">
        <input type="text" name="curriculo_areaProf" placeholder="Insira a área que procura">
        <button type="submit">Buscar</button>
    </form>
</body>
</html>