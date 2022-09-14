<?php
include_once('../config.php');
if(empty($_SESSION['aluno_id'])){
    header('Location:../views/unset.php');
}
if(empty($_POST['titulo_vaga'])){
    header('Location:../views/buscaVaga.php');
    exit;
}

$titulo="%".trim($_POST['titulo_vaga'])."%";
$query=$conn->prepare("SELECT * FROM projeto.vaga WHERE titulo LIKE :titulo");
$query->bindParam(':titulo', $titulo, PDO::PARAM_STR);
$query->execute();
$resultados=$query->fetchAll(PDO::FETCH_ASSOC);

include_once('../templates/cabecalho.php');
?>
<html lang="pt-BR">
<body>
    <h2>Resultados da busca</h2>

    <?php
    if(count($resultados)){
        foreach($resultados as $resultado){?>
            <label for=""><?php echo $resultado['titulo'];?></label>
            <label for=""><?php echo $resultado['id']?></label>
            <br></br>
            <form action="../process/historico.php" method="POST">
                <input type="hidden" name="id" value="<?=$resultado['id']?>">
                <button type="submit">Enviar Curriculo</button>
            </form>
            <br></br>
    <?php
        }
    }else{
    ?>
            <label for="">Não foi possível encontrar a vaga</label>
    <?php
    }
    ?>
</body>
</html>