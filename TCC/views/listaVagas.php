<?php
if(empty($_SESSION['empresa_id'])){
    header('Location:../views/unset.php');
}
    include_once('../config.php');
    include_once('../process/vaga.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lista de Vagas</h1>
    <?php foreach($vagas as $vaga):?>
        <h3><?=$vaga['titulo'];?></h3>
        <p><?=$vaga['cargo'];?></p>
        <p><?=$vaga['descricao'];?></p>
        <p><?=$vaga['beneficio'];?></p>
        <p><?=$vaga['exigencia'];?></p>
        <p><?=$vaga['id'];?></p>
        <a href = "detalhesVaga.php?id=<?=$vaga['id']?>">Visualizar</a>
    <?php endforeach;?>
</body>
</html>